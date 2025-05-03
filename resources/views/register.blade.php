<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https//cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" placeholder="Name"
                   class="w-full p-2 mb-4 border border-gray-300 rounded" required>

            <input type="email" name="email" placeholder="Email"
                   class="w-full p-2 mb-4 border border-gray-300 rounded" required>

            <input type="password" name="password" placeholder="Password"
                   class="w-full p-2 mb-4 border border-gray-300 rounded" required>

            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                   class="w-full p-2 mb-4 border border-gray-300 rounded" required>

            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                Register
            </button>
        </form>
        <p class="text-sm text-center mt-4">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
