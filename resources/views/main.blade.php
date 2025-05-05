<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom gradient based on your design */
        body {
            background: linear-gradient(to bottom, #2d4c74, #0e2a4d);
        }
    </style>
</head>
<body class="text-white min-h-screen">

    <!-- Navigation -->
    <nav class="border-b border-white py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <!-- Small logo (top-left) -->
            <div class="flex items-center">
                <img src="{{ asset('images/vento.png') }}" alt="Logo" class="h-10 w-10">
            </div>

            <!-- Menu -->
            <div class="hidden md:flex gap-6 items-center">
                <a href="#" class="text-white hover:underline">Home</a>
                <a href="#" class="text-white hover:underline">Features</a>
                <a href="#" class="bg-white text-blue-900 px-4 py-1 rounded-full font-semibold hover:bg-gray-200">Sign In</a>
            </div>

            <!-- Hamburger (mobile) -->
            <div class="md:hidden">
                <button id="menuBtn" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden px-4 pb-4">
            <a href="#" class="block py-2 text-white hover:underline">Home</a>
            <a href="#" class="block py-2 text-white hover:underline">Features</a>
            <a href="#" class="block py-2 text-white hover:underline">Sign In</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="flex items-center h-[calc(100vh-5rem)] px-10">
        <div>
            <!-- Logo (main hero image) -->
            <img src="{{ asset('images/hero.png') }}" alt="Vento Inventory Logo" class="mb-6 w-100">
            <!-- Button -->
            <a href="#" class="bg-white text-blue-900 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition">
                Read More
            </a>
        </div>
    </section>

    <script>
        // Toggle mobile menu
        document.getElementById('menuBtn').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>
