<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PosController extends Controller
{
    public function pos(Request $request)
    {
        $query = Product::query(); // starting query

        // Apply search functionality if a search query is present
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        // Check for sort parameter
        if ($request->has('sort') && $request->sort === 'name') {
            $direction = $request->get('direction', 'asc') === 'desc' ? 'desc' : 'asc';
            $query->orderBy('name', $direction);
        }

        // Pagination (can use get() if pagination is not needed)
        $products = $query->paginate(10); // You can change 10 to any other value as needed

        return view('pos', compact('products'));
    }

    public function viewCart()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('pos')->with('error', 'Your cart is empty.');
        }

        return view('cart', compact('cart'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // Simple cart using session
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price ?? 0,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', $product->name . ' added to cart.');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    public function checkout()
    {
        $cart = session('cart');

        if (!$cart || count($cart) === 0) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        // Example processing: reduce stock, save order, etc.
        foreach ($cart as $id => $item) {
            $product = Product::find($id);
            if ($product && $product->stock >= $item['quantity']) {
                $product->stock -= $item['quantity'];
                $product->sold_items += $item['quantity'];
                $product->save();
            }
        }

        session()->forget('cart');

        return redirect()->back()->with('success', 'Checkout complete!');
    }
}
