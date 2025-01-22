<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Register</h2>

    <form wire:submit.prevent="register">
        <!-- Form Fields -->
        @foreach (['name', 'second_name', 'email', 'phone_number', 'profession', 'web_url', 'password'] as $field)
            <div class="mb-4">
                <label for="{{ $field }}" class="block font-bold">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                <input type="{{ $field === 'password' ? 'password' : 'text' }}" id="{{ $field }}" wire:model="{{ $field }}"
                    class="w-full border rounded px-3 py-2">
                @error($field) <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        @endforeach

        <div class="mb-4">
            <label for="profile_photo" class="block font-bold">Profile Photo</label>
            <input type="file" id="profile_photo" wire:model="profile_photo" class="w-full">
            @error('profile_photo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Register</button>
    </form>
</div>