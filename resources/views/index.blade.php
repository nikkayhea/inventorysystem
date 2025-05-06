<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory view</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-800 p-6 flex flex-col">
            <h1 class="text-white text-2xl font-bold mb-6">vento</h1>
            <h2 class="text-white text-lg mb-1">INVENTORY</h2>
            <div class="text-white mb-6">
                <p>OWNER1</p>
                <p>OWNER@nimbly.app.ph</p>
            </div>
            <a href="{{ route('pos') }}" class="w-full bg-yellow-500 text-black py-2 mb-2 rounded text-center">POS</a>
            <a href="{{ route('sales') }}" class="w-full bg-yellow-500 text-black py-2 mb-2 rounded text-center">Sales</a>
            <a href="{{ route('index') }}" class="w-full bg-yellow-500 text-black py-2 mb-2 rounded text-center">Inventory</a>

            <div class="mt-auto">
                <a href="#" class="w-full text-left py-2 text-white">Toggle</a>
                <a href="#" class="w-full text-left py-2 text-white">View Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left py-2 text-white">Sign Out</button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-auto">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold">Inventory</h1>
                <a href="#" class="bg-blue-500 text-white rounded-full px-4 py-2">View Profile</a>
            </div>

            <!-- Add Product Form -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Add New Product</h2>
                <form action="{{ route('index') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @csrf
                    <input type="text" name="name" placeholder="Product Name" required class="border rounded px-3 py-2">
                    <input type="number" name="stock" placeholder="Remaining Stocks" required class="border rounded px-3 py-2">
                    <input type="number" name="price" step="0.01" placeholder="Price" required class="border rounded px-3 py-2">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add</button>
                </form>
            </div>

            <!-- Products Table -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Inventory Dashboard Products</h2>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2">Product Name</th>
                            <th class="p-2">Remaining Stocks</th>
                            <th class="p-2">Sold Items</th>
                            <th class="p-2">Price</th>
                            <th class="p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="border-b">
                            <td class="p-2">{{ $product->name }}</td>
                            <td class="p-2">{{ $product->stock }}</td>
                            <td class="p-2">{{ $product->sold_items }}</td>
                            <td class="p-2">P{{ number_format($product->price, 2) }}</td>
                            <td class="p-2">
                                <form action="{{ route('inventory.destroy', $product->product_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Add Button (Floating) -->
            <a href="{{ route('create') }}"
                class="bg-red-500 text-white rounded-full p-4 fixed bottom-6 right-6 shadow-lg hover:bg-red-600">
                Add
            </a>

        </div>
    </div>
    @endsection

</body>
</html>
