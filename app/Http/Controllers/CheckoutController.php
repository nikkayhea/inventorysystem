<?php

// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric|min:0',
        ]);

        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        $total = collect($cart)->sum(fn($item) => $item['quantity'] * $item['price']);
        $amountPaid = $request->input('amount');
        $change = $amountPaid - $total;

        if ($change < 0) {
            return redirect()->back()->with('error', 'Amount paid is not enough.');
        }

        // Save to sales table
        $sale = Sale::create([
            'total' => $total,
            'payment_method' => $request->payment_method,
            'amount_paid' => $amountPaid,
            'change' => $change,
        ]);

        // Optionally: Clear the cart
        Session::forget('cart');

        return redirect()->route('sales')->with('success', 'Payment successful.');
    }
}
