<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-lg font-medium mb-4 border-b pb-2">Update Profile</h2>

    @if (session('success'))
        <div class="text-green-500 text-sm mb-4">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="updateProfile">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="second_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="second_name" wire:model="second_name"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" wire:model="email"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone_number" wire:model="phone_number"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="profession" class="block text-sm font-medium text-gray-700">Profession</label>
                <input type="text" id="profession" wire:model="profession"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="web_url" class="block text-sm font-medium text-gray-700">Web URL</label>
                <input type="text" id="web_url" wire:model="web_url"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" wire:model="password"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
            </div>
        </div>
        <button type="submit"
            class="mt-6 w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
            Update Profile
        </button>
    </form>
</div>