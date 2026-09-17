<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('menu', compact('products'));
    }

    public function create()
    {
        return view('add_product');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('images'), $imageName);

            $data['image'] = $imageName;
        }

        Product::create($data);

        return redirect()
            ->route('menu')
            ->with('success', 'Product added successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('images'), $imageName);

            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect()->route('menu');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('menu');
    }
}