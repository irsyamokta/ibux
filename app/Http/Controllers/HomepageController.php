<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class HomepageController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('frontend.index', compact('products'));
    }

    public function view(Product $product, $id)
    {
        $product = Product::find($id);
        return view('frontend.auth.product.detail', compact('product'));
    }

    public function cartStore(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->quantity;

        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = Cart::firstOrCreate(['user_id' => auth()->id(), 'product_id' => $productId], ['quantity' => 0]);

        $cart->quantity += $quantity;

        $cart->save();

        return redirect()->route('cart.view')->with('success', 'Product added to cart.');
    }

    public function cartView()
    {
        $carts = Cart::where('user_id', auth()->id())->with('product')->get();
        $total = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });
        return view('frontend.auth.product.cart', compact('carts', 'total'));
    }

    public function cartDestroy($id)
    {
        $cart = Cart::where('user_id', auth()->id())->where('id', $id)->first();
        $cart->delete();
        return redirect()->route('cart.view')->with('success', 'Product removed from cart.');
    }

    public function checkout()
    {
        $carts = Cart::where('user_id', auth()->id())->with('product')->get();
        $total = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });
        return view('frontend.auth.product.checkout', compact('carts', 'total'));
    }

    public function updateQuantity(Request $request, $id)
    {
        $cart = Cart::where('user_id', auth()->id())->where('id', $id)->first();
        $cart->quantity = $request->quantity;
        $cart->save();
        return redirect()->route('cart.view')->with('success', 'Product quantity updated.');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $products = Product::where('name', 'like', '%' . $query . '%')->paginate(10);

        if (auth()->check()) {
            return view('frontend.auth.product.search', compact('products', 'query'));
        } else {
            return view('frontend.guest.section.search', compact('products', 'query'));
        }
    }
}
