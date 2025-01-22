<div class="p-6">
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
</div>