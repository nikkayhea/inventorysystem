<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-1/4 bg-blue-900 text-white p-5">
            <h1 class="text-lg font-bold">VENTO</h1>
            <h2 class="text-sm">INVENTORY</h2>
            <div class="mt-10">
                <h3 class="text-xs uppercase mb-2">Owner</h3>
                <p>OWNER1</p>
                <p>OWNER@nimbly.app.ph</p>
            </div>
            <div class="mt-10">
                <button onclick="window.location.href='{{ route('pos') }}'" class="flex items-center w-full bg-blue-700 text-white py-2 mb-2 rounded">
                    <span>📊</span><span class="ml-2">POS</span>
                </button>
                <button onclick="window.location.href='{{ route('sales') }}'" class="flex items-center w-full bg-blue-700 text-white py-2 mb-2 rounded">
                    <span>📈</span><span class="ml-2">Sales</span>
                </button>
                <button onclick="window.location.href='{{ route('index') }}'" class="flex items-center w-full bg-blue-700 text-white py-2 mb-2 rounded">
                    <span>📦</span><span class="ml-2">Inventory</span>
                </button>

            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-blue-500 text-white w-full py-2 rounded mt-2">Sign Out</button>
            </form>
            <div class="mt-10">
                <button class="bg-blue-500 text-white w-full py-2 rounded mt-2">View Profile</button>
                <button class="bg-blue-500 text-white w-full py-2 rounded mt-2">Toggle</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">SALES</h1>
                <button class="bg-blue-500 text-white px-4 py-2 rounded">View Profile</button>
            </div>
            <h2 class="text-lg mt-5">Today's Sales Report</h2>
            <p class="mt-1">Sales summary</p>

            <!-- Sales Summary -->
            <div class="bg-white mt-5 p-4 rounded shadow">
                <h3 class="text-xl font-semibold mb-2">Popular Products</h3>
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 text-left">Product name</th>
                            <th class="py-2 text-left">Total orders</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-2">Coke</td>
                            <td class="py-2">1</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Summary Info -->
            <div class="flex justify-end bg-white mt-5 p-4 rounded shadow">
                <div class="w-1/3">
                    <h3 class="text-lg font-semibold mb-2">Sales</h3>
                    <div class="mb-2">Total Product Sold: <strong>1</strong></div>
                    <div class="mb-2">Total Item Sold: <strong>1</strong></div>
                    <div class="mb-2">Total Sales Amount: <strong>P 24.00</strong></div>
                    <button class="mt-4 w-full bg-blue-500 text-white px-4 py-2 rounded">Review details</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
