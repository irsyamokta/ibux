<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use App\Models\Order;
use Midtrans\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MidtransController extends Controller
{
    public function index()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $user = Auth::user();

        $uuid = Str::uuid();

        $orders = Order::where('user_id', $user->id)
            ->latest()
            ->first();

        if ($orders) {
            $orders->load('product');
        }

        if (!$orders) {
            return view('frontend.auth.payment.index', compact('orders'));
        }

        if ($orders && $orders->status_payment == 'paid') {
            return view('frontend.auth.payment.index', compact('orders'));
        }

        $params = [
            'transaction_details' => [
                'order_id' => $orders->transaction_id,
                'gross_amount' => $orders->total_price,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
            ],
            'item_details' => [
                [
                    'id' => $orders->product->id,
                    'price' => $orders->product->price,
                    'quantity' => $orders->quantity,
                    'name' => $orders->product->name,
                ],
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return view('frontend.auth.payment.index', compact('snapToken', 'orders'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create transaction: ' . $e->getMessage()], 500);
        }
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('SHA512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::where('transaction_id', $request->order_id)->first();
                $order->status_payment = 'paid';
                $order->save();
            } else {
                $order = Order::where('transaction_id', $request->order_id)->first();
                $order->status_payment = 'canceled';
                $order->save();
            }
            return redirect()->route('order.detail')->with('success', 'Transaction status updated successfully!');
        }
    }
}
