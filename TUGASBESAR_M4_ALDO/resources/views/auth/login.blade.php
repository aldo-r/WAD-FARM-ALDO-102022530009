<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold text-gray-800 text-center">Masuk</h1>
        <p class="text-sm text-gray-500 text-center mt-1 mb-6">Silakan login ke akunmu</p>

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-600 text-sm p-3">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="rounded border-gray-300">
                <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg py-2 transition">
                Login
            </button>
        </form>

        <p class="text-sm text-gray-600 text-center mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar</a>
        </p>
    </div>
</body>
</html>