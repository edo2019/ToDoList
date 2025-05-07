{{-- <div class="p-6">
    <a href="{{ route('update-profile') }}" class="text-blue-600 hover:text-blue-800">Update Profile</a>
    <h1 class="text-2xl font-bold mb-4">To-Do List</h1>

    <div class="mb-4">
        <input type="text" wire:model="newTask" placeholder="Add a new task" class="border px-4 py-2 rounded w-full">
        <button wire:click="addTask" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">
            Add Task
        </button>

        @error('newTask')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <ul>
        @foreach($tasks as $task)
        <li class="flex justify-between items-center mb-2">
            <div>
                <input type="checkbox" wire:click="toggleTask({{ $task->id }})" {{ $task->completed ? 'checked' : '' }}>
                <span class="{{ $task->completed ? 'line-through' : '' }}">
                    {{ $task->title }}
                </span>
            </div>
            <button wire:click="deleteTask({{ $task->id }})" class="bg-red-500 text-white px-2 py-1 rounded">
                Delete
            </button>
        </li>
        @endforeach
    </ul>
</div> --}}
<div class="p-6">
    <a href="{{ route('update-profile') }}" class="text-blue-600 hover:text-blue-800">Update Profile</a>
    <h1 class="text-2xl font-bold mb-4">To-Do List</h1>

    <div class="mb-4">
        <select wire:model.live="taskCategoryFilter" class="border px-4 py-2 rounded w-full">
            <option value="">All Categories</option>
            <option value="official">Official</option>
            <option value="personal">Personal</option>
            <option value="others">Others</option>
        </select>
    </div>

    <div class="mb-4 flex">
        <input type="text" wire:model="newTaskTitle" placeholder="Add a new task"
            class="border px-4 py-2 rounded-l w-full">
        {{-- <select wire:model="newTaskCategory" class="border px-2 py-2 rounded-none">
            <option value="official">Official</option>
            <option value="personal">Personal</option>
            <option value="others">Others</option>
        </select> --}}
        <select wire:model="newTaskCategory" class="border px-2 py-2 rounded-none">
            <option value="official">Official</option>
            <option value="personal">Personal</option>
            <option value="others">Others</option>
        </select>
        <button wire:click="addTask" class="bg-blue-500 text-white px-4 py-2 rounded-r">
            Add Task
        </button>
    </div>

    @error('newTaskTitle')
        <span class="text-red-500">{{ $message }}</span>
    @enderror

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
        @if ($taskCategoryFilter === '' || $taskCategoryFilter === 'official')
            <div class="shadow-md rounded-md overflow-hidden">
                <div class="bg-gray-100 p-3">
                    <h2 class="text-xl font-semibold mb-2">Official Tasks</h2>
                </div>
                <table class="w-full border-collapse border border-slate-400">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 py-2 px-4 text-left">Task</th>
                            <th class="border border-slate-300 py-2 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($officialTasks as $task)
                            <tr>
                                <td class="border border-slate-300 py-2 px-4">
                                    <input type="checkbox" wire:click="toggleTask({{ $task->id }})" {{ $task->completed ? 'checked' : '' }}>
                                    <span class="{{ $task->completed ? 'line-through' : '' }}">
                                        {{ $task->title }}
                                    </span>
                                </td>
                                <td class="border border-slate-300 py-2 px-4">
                                    <button wire:click="deleteTask({{ $task->id }})"
                                        class="bg-red-500 text-white px-2 py-1 rounded">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="border border-slate-300 py-2 px-4" colspan="2">No official tasks yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif

        @if ($taskCategoryFilter === '' || $taskCategoryFilter === 'personal')
            <div class="shadow-md rounded-md overflow-hidden">
                <div class="bg-gray-100 p-3">
                    <h2 class="text-xl font-semibold mb-2">Personal Tasks</h2>
                </div>
                <table class="w-full border-collapse border border-slate-400">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 py-2 px-4 text-left">Task</th>
                            <th class="border border-slate-300 py-2 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($personalTasks as $task)
                            <tr>
                                <td class="border border-slate-300 py-2 px-4">
                                    <input type="checkbox" wire:click="toggleTask({{ $task->id }})" {{ $task->completed ? 'checked' : '' }}>
                                    <span class="{{ $task->completed ? 'line-through' : '' }}">
                                        {{ $task->title }}
                                    </span>
                                </td>
                                <td class="border border-slate-300 py-2 px-4">
                                    <button wire:click="deleteTask({{ $task->id }})"
                                        class="bg-red-500 text-white px-2 py-1 rounded">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="border border-slate-300 py-2 px-4" colspan="2">No personal tasks yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif

        @if ($taskCategoryFilter === '' || $taskCategoryFilter === 'others')
            <div class="shadow-md rounded-md overflow-hidden">
                <div class="bg-gray-100 p-3">
                    <h2 class="text-xl font-semibold mb-2">Other Tasks</h2>
                </div>
                <table class="w-full border-collapse border border-slate-400">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 py-2 px-4 text-left">Task</th>
                            <th class="border border-slate-300 py-2 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($otherTasks as $task)
                            <tr>
                                <td class="border border-slate-300 py-2 px-4">
                                    <input type="checkbox" wire:click="toggleTask({{ $task->id }})" {{ $task->completed ? 'checked' : '' }}>
                                    <span class="{{ $task->completed ? 'line-through' : '' }}">
                                        {{ $task->title }}
                                    </span>
                                </td>
                                <td class="border border-slate-300 py-2 px-4">
                                    <button wire:click="deleteTask({{ $task->id }})"
                                        class="bg-red-500 text-white px-2 py-1 rounded">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="border border-slate-300 py-2 px-4" colspan="2">No other tasks yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<h1>Documents</h1>
<a href="{{ route('documents.create') }}">Upload New Document</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documents as $document)
            <tr>
                <td>{{ $document->name }}</td>
                <td>
                    <a href="{{ route('documents.preview', $document) }}" target="_blank">Preview</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>