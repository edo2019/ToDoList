<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">PDF Documents</h1>
        <button wire:click="$emit('openUploadModal')" class="px-4 py-2 bg-blue-600 text-white rounded">
            Upload New PDF
        </button>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($documents as $document)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $document->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button wire:click="preview({{ $document->id }})"
                                class="text-blue-600 hover:text-blue-900 mr-3">
                                Preview
                            </button>
                            <a href="{{ asset('storage/' . $document->file_path) }}" download
                                class="text-green-600 hover:text-green-900">
                                Download
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                            No documents uploaded yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($previewDocument)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50" x-data="{ open: true }"
            x-show="open" @keydown.escape.window="open = false">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-screen overflow-hidden">
                <div class="flex justify-between items-center border-b p-4">
                    <h3 class="text-lg font-medium">{{ $previewDocument->name }}</h3>
                    <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                        &times;
                    </button>
                </div>
                <div class="p-4 h-[70vh]">
                    <iframe src="{{ asset('storage/' . $previewDocument->file_path) }}"
                        class="w-full h-full border-0"></iframe>
                </div>
            </div>
        </div>
    @endif

    @livewire('document-upload')
</div>