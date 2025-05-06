<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class SalesController extends Controller
{
    /**
     * Display today's sales report.
     */
    public function sales()
    {
        $sales = Sale::whereDate('created_at', today())->get();
        $totalProductsSold = $sales->count();
        $totalItemsSold = $sales->sum('quantity');
        $totalAmount = $sales->sum('amount');

        $products = Product::withCount(['sales' => function($query) {
            $query->whereDate('created_at', today());
        }])->get();

        return view('sales', [
            'sales' => $sales,
            'products' => $products,
            'totalProductsSold' => $totalProductsSold,
            'totalItemsSold' => $totalItemsSold,
            'totalAmount' => $totalAmount,
        ]);
    }

    /**
     * Edit a specific sale.
     */
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified sale in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric',
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update($request->all());

        return redirect()->route('sales')->with('success', 'Sale updated successfully.');
    }

    /**
     * Export sales report.
     */
    public function export()
    {
        // Logic to export sales as CSV or another format
        // This can vary based on the library or method used for export 
    }
}