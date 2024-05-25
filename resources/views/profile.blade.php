<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex h-screen bg-gray-100">
<aside class="w-64 bg-gray-800 text-white p-4">
    <nav>
        <ul>
            <li class="mb-2"><a href="{{ route('profile') }}">Profile</a></li>
            <li class="mb-2"><a href="#">Account</a></li>
            <li class="mb-2"><a href="#">Emails</a></li>
            <li class="mb-2"><a href="/profile/movies">Watched Movies</a></li>
        </ul>
    </nav>
</aside>
<main class="flex-1 p-4">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
            <h1 class="text-2xl font-bold mb-6">Profile Settings</h1>
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded" value="{{ auth()->user()->name }}">
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded" value="{{ auth()->user()->email }}">
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phone_number" class="block text-gray-700 font-bold mb-2">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="mt-1 p-2 w-full border border-gray-300 rounded" value="{{ auth()->user()->phone_number }}">
                    @error('phone_number')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 p-2 w-full border border-gray-300 rounded">
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Profile</button>
            </form>
        </div>
</main>
</body>
</html>
