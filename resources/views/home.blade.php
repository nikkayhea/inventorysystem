<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="flex bg-gray-200">
    <!-- Sidebar -->
    <div class="bg-blue-900 text-white w-1/4 h-screen p-5">
        <h1 class="text-2xl font-bold mb-6">Vento Inventory</h1>
        <div class="mb-4">
            <span class="font-semibold">OWNER1</span><br>
            <span>OWNER@nimby1.app.ph</span>
        </div>
        <nav class="flex flex-col">
            <a href="{{ route('pos') }}" class="block py-2 px-4 bg-yellow-500 rounded mb-2">POS</a>
            <a href="#" class="block py-2 px-4 hover:bg-yellow-500 rounded mb-2">Sales</a>
            <a href="{{ route('index') }}" class="block py-2 px-4 hover:bg-yellow-500 rounded mb-2">Inventory</a>
        </nav>

        <div class="mt-auto">
            <a href="#" class="flex justify-between items-center text-blue-200 py-2 mb-4 rounded hover:bg-blue-800">
                <span>View Profile</span>
                <span class="text-xs">toggle</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white w-full py-2 rounded">
                    Sign Out
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-grow bg-white p-5">
        <h2 class="text-3xl font-bold mb-4">Inventory Dashboard Products</h2>
        <div class="bg-gray-200 p-4 mb-4 rounded shadow">
            <strong>Product name:</strong> Coke<br>
            <strong>Remaining Stocks:</strong> 50<br>
            <strong>Sold Items:</strong> 150
        </div>
        <input type="text" placeholder="Search Products..." class="border rounded p-2 mb-4 w-full" />
        <button class="bg-pink-500 text-white p-2 rounded">Add</button>
    </div>
</body>
</html>