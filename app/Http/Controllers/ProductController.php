<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function form()
    {
        return view('backend.dashboard.product.store');
    }
    public function store()
    {
        $store = new Product();
        $store->name = request('name');
        $store->price = request('price');
        $store->stock = request('stock');
        $store->description = request('description');

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $path = $file->store('uploads', 'public');
            $store->image = $path;
        }

        $store->save();
        return redirect()->route('products')->with('success', 'Produk berhasil dotambahkan!');
    }

    public function view(Product $product, $id)
    {
        $product = Product::find($id);
        return view('backend.dashboard.product.update', compact('product'));
    }

    public function update(Product $product, $id)
    {
        $product = Product::find($id);
        $product->name = request('name');
        $product->price = request('price');
        $product->stock = request('stock');
        $product->description = request('description');

        if (request()->hasFile('image')) {
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }

            $file = request()->file('image');
            $path = $file->store('uploads', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('products')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products')->with('success', 'Product deleted successfully!');
    }

}
