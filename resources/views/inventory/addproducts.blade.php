<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-lg rounded-lg border border-blue-500 p-6 w-96">
    <h1 class="text-2xl font-bold mb-6">Add Product</h1>
    
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex mb-4">
            <!-- Image Upload -->
            <div class="w-1/3 border border-gray-300 h-48 flex items-center justify-center relative">
                <input type="file" name="image" accept="image/*" class="absolute w-full h-full opacity-0 cursor-pointer">
                <span class="text-gray-400 text-sm text-center px-2">Click to upload image</span>
            </div>

            <!-- Form Fields -->
            <div class="w-2/3 pl-4">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Product Name:</label>
                    <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Product Price:</label>
                    <input type="number" name="price" step="0.01" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Remaining Quantity:</label>
                    <input type="number" name="stock" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Product Description:</label>
                    <textarea name="description" class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="3"></textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md">Confirm</button>
            <a href="{{ route('index') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-md">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
