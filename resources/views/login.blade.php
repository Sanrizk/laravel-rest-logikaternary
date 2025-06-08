<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-bold text-center text-gray-700">Login</h2>
        <form action="{{ url()->current() }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                {{-- <input type="{{ (substr(url()->current(),-5) == 'login') ? 'email' : 'text' }}" name="email" class="w-full p-2 mt-1 border rounded-md" required> --}}
                <input type="{{ (substr(url()->current(),-5) == 'login') ? 'email' : 'text' }}" name="{{ (substr(url()->current(),-5) == 'login') ? 'email' : 'username' }}" class="w-full p-2 mt-1 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" class="w-full p-2 mt-1 border rounded-md" required>
            </div>
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Login</button>
        </form>
        <p class="mt-4 text-sm text-center">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500">Daftar</a>
        </p>
    </div>
</body>
</html>
