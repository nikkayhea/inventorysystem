<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PaymentMethod;

class HomeController extends Controller
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

    public function addToCart($product_id)
    {
        $product = Product::findOrFail($product_id);

        // Retrieve the existing cart from the session, or initialize an empty array
        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            // If the product is already in the cart, increment its quantity
            $cart[$product_id]['quantity']++;
        } else {
            // If the product is not in the cart, add it with quantity 1
            $cart[$product_id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price ?? 0,
            ];
        }

        // Store the updated cart back into the session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', $product->name . ' added to cart.');
    }


    public function removeFromCart($product_id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
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
        foreach ($cart as $product_id => $item) {
            $product = Product::find($product_id);
            if ($product && $product->stock >= $item['quantity']) {
                $product->stock -= $item['quantity'];
                $product->sold_items += $item['quantity'];
                $product->save();
            }
        }

        session()->forget('cart');

        return redirect()->back()->with('success', 'Checkout complete!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $paymentMethod = PaymentMethod::all();

        return view('cart', compact('cart', 'paymentMethod'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'change' => 'nullable|numeric|min:0',
        ]);

        // Example: save payment or order logic here
        // Order::create([...]);

        return redirect()->route('receipt')->with('success', 'Payment successful!');
    }

    // app/Http/Controllers/CartController.php

    



    
}
