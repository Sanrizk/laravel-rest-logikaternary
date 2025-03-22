<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-md text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-700">Dashboard</h2>
            <p class="mb-4 text-gray-600">Selamat datang, {{ auth()->user()->name }}!</p>
            
            <a href="{{ route('logout') }}" 
                class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</body>
</html>
