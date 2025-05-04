<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="sidebar">
        <h2 class="text-xl font-bold">VENTO</h2>
        <div class="my-4">OWNER1<br>OWNER1@nimbly.app.ph</div>
        <button class="bg-yellow-500 text-white w-full p-2 mb-2">POS</button>
        <button class="bg-yellow-500 text-white w-full p-2 mb-2">Sales</button>
        <button class="bg-yellow-500 text-white w-full p-2 mb-2">Inventory</button>
        <button class="bg-blue-500 text-white w-full p-2">Toggle</button>
        <button class="bg-red-500 text-white w-full p-2 mt-4">Sign Out</button>
    </div>
    <div class="content">
        <div class="header">
            <h1>Sales</h1>
            <button class="logout-button" formmethod="POST" action="{{ route('logout') }}">
                Logout
            </button>
        </div>
        <h2 class="mt-4">Today's Sales Report</h2>
        <h3>Sales summary</h3>
        <div class="border border-gray-300 p-4 my-4">
            <h4>Popular Products</h4>
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="py-2">Product Name</th>
                        <th class="py-2">Total Orders</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2">Coke</td>
                        <td class="py-2">1</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="border border-gray-300 p-4 my-4">
            <h4>Sales</h4>
            <p>Total Product Sold: <strong>1</strong></p>
            <p>Total Item Sold: <strong>1</strong></p>
            <p>Total Sales Amount: <strong>P 24.00</strong></p>
            <button class="bg-blue-500 text-white p-2 mt-4">Review Details</button>
        </div>
    </div>
</body>
</html>