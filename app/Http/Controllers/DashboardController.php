<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        $orders->load('product');
    
        $sale = $orders->sum(function($order) {
            return $order->quantity;
        });
    
        $revenue = $orders->sum(function($order) {
            return $order->quantity * $order->product->price;
        });
    
        $product = Product::count();
    
        return view('backend.dashboard.index', compact('orders', 'sale', 'revenue', 'product'));
    }

    public function product()
    {
        $products = Product::paginate(10);
        return view('backend.dashboard.product.index', compact('products'));
    }

    public function order()
    {
        $orders = Order::orderBy('created_at', 'asc')->paginate(10);
        $orders->load('product');

        return view('backend.dashboard.order.index', compact('orders'));
    }

    public function view(Order $order, $id)
    {
        $order = Order::find($id);
        return view('backend.dashboard.order.update', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->resi = $request->resi;
        $order->status_delivery = $request->status_delivery;
        $order->save();
        return redirect()->route('dashboard');
    }
}
