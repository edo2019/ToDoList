<div class="p-6">
    <h2 class="text-lg font-medium mb-4">Update Profile</h2>

    @if (session('success'))
        <div class="text-green-500 text-sm mb-4">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="updateProfile">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-sm">Name</label>
                <input type="text" id="name" wire:model="name" class="mt-1 w-full border-gray-300 rounded shadow-sm">
            </div>
            <div>
                <label for="last_name" class="block text-sm">Last Name</label>
                <input type="text" id="last_name" wire:model="last_name"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm">
            </div>
            <div>
                <label for="email" class="block text-sm">Email</label>
                <input type="email" id="email" wire:model="email" class="mt-1 w-full border-gray-300 rounded shadow-sm">
            </div>
            <div>
                <label for="phone_number" class="block text-sm">Phone</label>
                <input type="text" id="phone_number" wire:model="phone_number"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm">
            </div>
            <div>
                <label for="profession" class="block text-sm">Profession</label>
                <input type="text" id="profession" wire:model="profession"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm">
            </div>
            <div>
                <label for="web_url" class="block text-sm">Web URL</label>
                <input type="text" id="web_url" wire:model="web_url"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm">
            </div>
            <div>
                <label for="password" class="block text-sm">Password</label>
                <input type="password" id="password" wire:model="password"
                    class="mt-1 w-full border-gray-300 rounded shadow-sm">
            </div>
        </div>
        <button type="submit" class="mt-4 bg-blue-600 text-white py-2 px-4 rounded">Update Profile</button>
    </form>
</div>