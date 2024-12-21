<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        try {
            return view('frontend.auth.order.index', compact('orders'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create transaction: ' . $e->getMessage()], 500);
        }
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $uuid = Str::uuid();
    
        try {
            $carts = Cart::where('user_id', $user->id)
                ->with('product')
                ->get();
    
            $totalPrice = 0;
            $orderData = [];
    
            foreach ($carts as $cart) {
                $product = $cart->product;
    
                if ($product->stock < $cart->quantity) {
                    return redirect()
                        ->back()
                        ->with('error', "Stok produk {$product->name} tidak mencukupi!");
                }
    
                $product->decrement('stock', $cart->quantity);
    
                $totalPrice += $product->price * $cart->quantity;
    
                $orderData[] = [
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'transaction_id' => $uuid,
                    'quantity' => $cart->quantity,
                    'total_price' => $product->price * $cart->quantity,
                    'note' => $request->input('note'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
    
            Order::insert($orderData);

            Cart::where('user_id', $user->id)->delete();
    
            return redirect()
                ->route('midtrans.payment')
                ->with('success', 'Checkout berhasil! Total: Rp ' . number_format($totalPrice, 0, ',', '.'));
        } catch (\Exception $e) {
    
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat proses checkout: ' . $e->getMessage());
        }
    }
    

    public function confirm($id)
    {
        $order = Order::find($id);
        $order->status_delivery = 'selesai';
        $order->save();
        return redirect()->route('order.detail');
    }
}
