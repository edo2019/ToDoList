<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded shadow">
        @if (session('error'))
            <div class="text-red-500 text-sm mb-4">{{ session('error') }}</div>
        @endif

        <form wire:submit.prevent="login">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" id="email" wire:model="email" class="mt-1 w-full border-gray-300 rounded shadow-sm">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" id="password" wire:model="password"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm">
            </div>
            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" wire:model="remember" class="rounded border-gray-300">
                    <span class="ml-2 text-sm">Remember me</span>
                </label>
            </div>
            <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded">Login</button>
        </form>
        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800">Register</a>
    </div>
</div>