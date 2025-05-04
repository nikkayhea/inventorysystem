<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="container mx-auto p-6">
        <h2 class="text-xl font-bold mb-4">Your Cart</h2>

        @if(session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
        @endif

        @if(count($cart) > 0)
            <ul>
                @foreach($cart as $id => $item)
                    <li class="mb-4 p-4 border-b">
                        <p class="text-lg">{{ $item['name'] }}</p>
                        <p class="text-sm">Quantity: {{ $item['quantity'] }}</p>
                        <p class="text-sm">Price: P{{ number_format($item['price'], 2) }}</p>
                        <p class="text-sm">Total: P{{ number_format($item['quantity'] * $item['price'], 2) }}</p>

                        <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-red-500 hover:underline ml-2">Remove</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <p class="font-bold mt-4">Total: P{{ number_format(collect($cart)->sum(fn($item) => $item['quantity'] * $item['price']), 2) }}</p>

            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mt-3">
                    Checkout
                </button>
            </form>
        @else
            <p>Your cart is empty.</p>
            <a href="{{ route('pos') }}" class="text-blue-500 hover:underline">Back to Products</a>
        @endif
    </div>
</body>
</html>
