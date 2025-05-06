<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans h-screen">

    <div class="flex h-full overflow-hidden">

        <!-- Sidebar -->
        <div class="bg-blue-900 w-1/4 flex flex-col p-5">
            <h1 class="text-white text-2xl font-bold mb-5">vento</h1>
            <h2 class="text-gray-300 mb-5">GROUP 4</h2>
            <h3 class="text-gray-400 mb-5">OWNER@vento.app.ph</h3>
            <div class="flex flex-col space-y-3">
                <button onclick="window.location.href='{{ route('pos') }}'" class="bg-yellow-500 text-black py-2 rounded">POS</button>
                <button onclick="window.location.href='{{ route('sales') }}'" class="bg-yellow-500 text-black py-2 rounded">Sales</button>
                <button onclick="window.location.href='{{ route('index') }}'" class="bg-yellow-500 text-black py-2 rounded">Inventory</button>
            </div>
            <div class="mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white py-2 rounded mt-2">Sign Out</button>
                </form>
                <button onclick="window.location.href='{{ route('profile') }}'" class="bg-blue-300 mt-2 py-2 rounded">View Profile</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto p-6">
            <div class="bg-white border rounded-lg shadow-lg p-6 max-w-3xl mx-auto">
                <h2 class="text-lg font-bold mb-4 text-center">Your Cart</h2>

                @if(session('error'))
                    <p class="text-red-500">{{ session('error') }}</p>
                @endif

                @if(session('success'))
                    <p class="text-green-600">{{ session('success') }}</p>
                @endif

                @if(count($cart) > 0)
                    <ul class="max-h-60 overflow-y-auto border p-2 rounded mb-4">
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

                    @php
                        $total = collect($cart)->sum(fn($item) => $item['quantity'] * $item['price']);
                    @endphp

                    <p class="font-bold mt-4">Total: P{{ number_format($total, 2) }}</p>

                    <!-- Payment Form -->
                    <form action="{{ route('payment.process') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto mt-6">
                        @csrf
                        <h3 class="text-lg font-bold mb-4">Payment</h3>

                        <div class="mb-4">
                            <span class="block text-sm font-medium">Pay with:</span>
                            <div class="flex space-x-4 mt-2" id="payment-options">
                                <button type="button" class="flex-1 py-2 bg-yellow-500 text-white rounded" data-method="Cash">Cash</button>
                                <button type="button" class="flex-1 py-2 bg-gray-200 rounded" data-method="Card">Card</button>
                                <button type="button" class="flex-1 py-2 bg-gray-200 rounded" data-method="Ewallet">Ewallet</button>
                            </div>
                            <input type="hidden" name="payment_method" id="payment-method" value="Cash">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1" for="amount">Amount Paid</label>
                            <input type="number" name="amount" id="amount" class="border rounded p-2 w-full" placeholder="Enter amount" required step="0.01" min="0">
                        </div>

                        <div class="text-center mb-4">
                            <span class="block text-xl font-bold">Pay PHP{{ number_format($total, 2) }}</span>
                        </div>

                        <div class="flex justify-between">
                            <button type="submit" class="w-1/2 bg-yellow-500 text-white rounded py-2">Pay</button>
                            <a href="{{ route('pos') }}" class="w-1/2 bg-gray-600 text-white text-center py-2 rounded block">Cancel</a>
                        </div>
                    </form>
                @else
                    <p>Your cart is empty.</p>
                    <a href="{{ route('pos') }}" class="text-blue-500 hover:underline">Back to Products</a>
                @endif
            </div>
        </div>
    </div>

    <script>
        const buttons = document.querySelectorAll('#payment-options button');
        const paymentInput = document.getElementById('payment-method');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                paymentInput.value = btn.dataset.method;

                buttons.forEach(b => {
                    b.classList.remove('bg-yellow-500', 'text-white');
                    b.classList.add('bg-gray-200');
                });

                btn.classList.add('bg-yellow-500', 'text-white');
                btn.classList.remove('bg-gray-200');
            });
        });
    </script>

</body>
</html>
