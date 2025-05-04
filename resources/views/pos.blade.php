<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">

    <!-- Sidebar -->
    <div class="bg-blue-800 text-white w-1/4 min-h-screen p-5">
        <h1 class="text-lg font-bold">Vento Inventory</h1>
        <h2 class="mt-3">GROUP 4</h2>
        <h3 class="mt-1">OWNER@vento-app.ph</h3>
        <nav class="mt-10">
            <a href="#" class="block py-2 px-4 bg-yellow-500 rounded mb-2">POS</a>
            <a href="#" class="block py-2 px-4 hover:bg-yellow-500 rounded mb-2">Sales</a>
            <a href="{{ route('index') }}" class="block py-2 px-4 hover:bg-yellow-500 rounded mb-2">Inventory</a>
        </nav>
        <button onclick="history.back()">Back</button>
        <a href="#" onclick="history.back(); return false;">Back</a>
        <button class="bg-red-500 hover:bg-red-600 text-white mt-10 px-4 py-2 rounded">Sign Out</button>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-10">
    <h2 class="text-lg mb-3">Choose a product</h2>

    @foreach ($products as $product)
        <div class="border rounded-lg p-5 mb-5">
            {{-- Placeholder image --}}
            <p class="text-lg mb-2">Add image</p>

            {{-- Dynamic price (if you have one) or placeholder --}}
            <p class="text-lg font-bold">P{{ $product->price ?? '0.00' }}</p>

            {{-- Product name or description --}}
            <p class="text-gray-600">{{ $product->name }}</p>

            {{-- Add to cart form --}}
            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded mt-2">
                    Add to cart
                </button>
            </form>
        </div>
    @endforeach

    <!-- Sort and View Cart Section -->
    <div class="flex items-center space-x-2 mt-2">
        <a href="{{ route('pos', ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}" class="text-blue-500 hover:text-blue-600">
            Sort by Name
        </a>

        <form action="{{ route('pos') }}" method="GET" class="flex items-center">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="border rounded-md p-2 w-3/4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded ml-2">
                Search
            </button>
        </form>

        <a href="{{ route('cart.view') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
            View Cart
        </a>
    </div>

    </div>
    
    @if(session('cart'))
    <h2 class="text-lg font-bold mb-2">Cart</h2>
    <ul class="mb-4">
        @foreach(session('cart') as $id => $item)
            <li class="mb-2">
                {{ $item['name'] }} - {{ $item['quantity'] }} x P{{ $item['price'] }} = 
                <strong>P{{ number_format($item['quantity'] * $item['price'], 2) }}</strong>

                {{-- Remove button --}}
                <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500 hover:underline ml-2">Remove</button>
                </form>
            </li>
        @endforeach
    </ul>

    {{-- Cart total --}}
    <p class="font-bold">
        Total: P{{ number_format(collect(session('cart'))->sum(fn($item) => $item['quantity'] * $item['price']), 2) }}
    </p>

    {{-- Checkout button --}}
    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mt-3">
            Checkout
        </button>
    </form>
    @endif
</body>
</html>
