<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
        {
            $products = Product::all();
            return view('index', compact('products'));
        }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric', // Validate price
        ]);

        Product::create($validatedData);

        return redirect()->route('index');
    

        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
        ]);

        return redirect()->route('index')->with('success', 'Product created successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('index')->with('success', 'Product removed successfully');
    }

    

}
