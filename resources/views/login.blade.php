<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" placeholder="Email"
                   class="w-full p-2 mb-4 border border-gray-300 rounded" required>

            <input type="password" name="password" placeholder="Password"
                   class="w-full p-2 mb-4 border border-gray-300 rounded" required>

            <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                Login
            </button>
        </form>
        <p class="text-sm text-center mt-4">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-green-600 hover:underline">Register</a>
        </p>
    </div>
</body>
</html>
