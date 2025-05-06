<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric|min:0',
        ]);

        $cart = session('cart', []);
        if (!$cart || count($cart) === 0) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        // Update stock
        foreach ($cart as $product_id => $item) {
            $product = Product::find($product_id);
            if ($product && $product->stock >= $item['quantity']) {
                $product->stock -= $item['quantity'];
                $product->sold_items += $item['quantity'];
                $product->save();
            } else {
                return redirect()->back()->with('error', "Insufficient stock for {$item['name']}.");
            }
        }

        // Save payment
        PaymentMethod::create([
            'id' => PaymentMethod::where('payee_method', $request->payment_method)->value('id'),
            'amount_paid' => $request->amount,
            'change' => $request->amount - collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
        ]);
        

        session()->forget('cart');

        return redirect()->route('pos')->with('success', 'Payment processed successfully.');
    }
}
