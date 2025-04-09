<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;

class TodoList extends Component
{ 
//     
public $tasks = [];
public $newTaskTitle = '';
public $newTaskCategory = 'official';
public $taskCategoryFilter = '';
public $officialTasks = [];
public $personalTasks = [];
public $otherTasks = [];

// ID of the guest user (replace with the actual ID from your database)
protected const GUEST_USER_ID = 1; // Example: Change this to your guest user's ID

protected $rules = [
    'newTaskTitle' => 'required|min:3|max:255',
    'newTaskCategory' => 'required|in:official,personal,others',
];

public function mount()
{
    $this->loadTasks();
}

public function loadTasks()
{
    $userId = auth()->id();

    if (!$userId) {
        $userId = self::GUEST_USER_ID;
    }

    $allTasks = Task::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

    $this->officialTasks = $allTasks->where('category', 'official');
    $this->personalTasks = $allTasks->where('category', 'personal');
    $this->otherTasks = $allTasks->where('category', 'others');

    $this->tasks = $allTasks; // Keep this for potential "All Categories" view
}

public function addTask()
{
    $this->validate();

    $userId = auth()->id();

    if (!$userId) {
        $userId = self::GUEST_USER_ID;
    }

    User::find($userId)->tasks()->create([
        'title' => $this->newTaskTitle,
        'category' => $this->newTaskCategory,
    ]);

    $this->newTaskTitle = '';
    $this->loadTasks();
}

public function toggleTask($id)
{
    $task = Task::findOrFail($id);

    // Ensure the task belongs to the current user (or guest user)
    $currentUserId = auth()->id() ?? self::GUEST_USER_ID;
    if ($task->user_id === $currentUserId) {
        $task->update(['completed' => !$task->completed]);
        $this->loadTasks();
    }
}

public function deleteTask($id)
{
    $task = Task::findOrFail($id);

    // Ensure the task belongs to the current user (or guest user)
    $currentUserId = auth()->id() ?? self::GUEST_USER_ID;
    if ($task->user_id === $currentUserId) {
        $task->delete();
        $this->loadTasks();
    }
}

public function updateCategoryFilter($category)
{
    $this->taskCategoryFilter = $category;
    $this->loadTasks();
}

    public function render()
    {
        return view('livewire.todo-list')->layout('layouts.app'); // Removed layout here, assuming it's handled in the Blade view
    }
}