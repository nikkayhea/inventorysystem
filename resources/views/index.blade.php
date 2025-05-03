<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory view</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>Inventory Dashboard Products</h1>

        <!-- Add Product Form -->
        <form action="{{ route('index') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="number" name="stock" placeholder="Remaining Stocks" required>
            <input type="number" name="price" step="0.01" placeholder="Price" required>
            <button type="submit">Add</button>

            <button onclick="history.back()">Back</button>
            <a href="#" onclick="history.back(); return false;">Back</a>
        </form>

        <!-- Products Table -->
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Remaining Stocks</th>
                    <th>Sold Items</th>
                    <th>Price</th>
                    <th>Actions</th> <!-- Added actions column -->
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->sold_items }}</td>
                        <td>P{{ number_format($product->price, 2) }}</td> <!-- Display price -->
                        
                        <!-- Delete Button Form -->
                        <td>
                            <form action="{{ route('inventory.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</body>
</html>
