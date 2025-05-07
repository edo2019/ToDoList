<div x-data="{ open: false }" x-show="open" @openUploadModal.window="open = true" @keydown.escape.window="open = false"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">

    <div class="bg-white rounded-lg shadow-xl w-full max-w-md" @click.away="open = false">
        <div class="flex justify-between items-center border-b p-4">
            <h3 class="text-lg font-medium">Upload PDF Document</h3>
            <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                &times;
            </button>
        </div>

        <form wire:submit.prevent="save" class="p-4 space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Document Name</label>
                <input type="text" id="name" wire:model="name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="document" class="block text-sm font-medium text-gray-700">PDF File</label>
                <input type="file" id="document" wire:model="document" class="mt-1 block w-full text-sm text-gray-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-md file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-50 file:text-blue-700
                              hover:file:bg-blue-100">
                @error('document') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button @click="open = false" type="button"
                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md flex items-center"
                    :disabled="$isUploading">
                    <span wire:loading wire:target="save" class="mr-2">
                        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span>
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>