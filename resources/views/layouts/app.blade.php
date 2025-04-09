<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <livewire:styles />
</head>
{{-- <nav class="flex items-center space-x-4">
    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">Login</a>
    <a href="{{ route('update-profile') }}" class="text-blue-600 hover:text-blue-800">Update Profile</a>
    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800">Register</a>
</nav> --}}

<body class="bg-gray-100 min-h-screen">

    <!-- Sidebar Component -->
    {{-- <x-app.sidebar /> --}}

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Navbar Component -->
        {{-- <x-app.navbar /> --}}

        <!-- Content Section -->
        <main class="flex-1 p-6 bg-gray-100">
            {{ $slot }}
        </main>
    </div>
    </div>
    {{--
    <div class="container mx-auto p-4">
        {{ $slot }}
    </div> --}}
    <livewire:scripts />
</body>

</html>