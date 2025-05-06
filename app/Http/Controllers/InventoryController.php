<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    // Store a new product
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        $validatedData['sold_items'] = 0; // Optional: default value

        Product::create($validatedData);

        return redirect()->route('index')->with('success', 'Product created successfully!');
    }


    // Delete a product
    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();

        return redirect()->route('index')->with('success', 'Product removed successfully');
    }

    public function create()
    {
        return view('inventory.addproducts');
    }

}
