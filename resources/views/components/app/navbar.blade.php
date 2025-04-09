<nav class="bg-white shadow p-4 flex justify-between items-center">
    <div>
        <a href="/" class="text-xl font-bold text-blue-600">To-Do App</a>
    </div>
    <div class="flex space-x-4">
        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">Login</a>
        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800">Register</a>
    </div>
</nav>