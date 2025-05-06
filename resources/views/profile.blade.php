<!-- resources/views/profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <h2 class="text-xl font-bold mb-4">Your Profile</h2>
        <!-- Add your profile details here -->
        <p class="mb-4">Name: Owner</p>
        <p class="mb-4">Email: owner@vento.app.ph</p>

        <a href="{{ route('index') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Back to Dashboard</a>
    </div>

</body>
</html>
