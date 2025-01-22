<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TodoList extends Component
{ public $tasks = [];
    public $newTask = '';

    protected $rules = [
        'newTask' => 'required|min:3|max:255', // Added max length for better validation
    ];

    /**
     * Initialize tasks when the component is mounted.
     */
    public function mount()
    {
        $this->loadTasks();
    }

    /**
     * Load all tasks ordered by the latest created.
     */
    public function loadTasks()
    {
        $this->tasks = Task::orderBy('created_at', 'desc')->get();
    }

    /**
     * Add a new task.
     */
    public function addTask()
    {
        $this->validate();
       // dd($this->newTask);
        Task::create(['title' => $this->newTask]);
       
        $this->newTask = ''; // Clear the input field
        $this->loadTasks();  // Refresh the task list
    }

    /**
     * Toggle the completion status of a task.
     *
     * @param int $id
     */
    public function toggleTask($id)
    {
        $task = Task::findOrFail($id); // Use findOrFail for error handling
        $task->update(['completed' => !$task->completed]);

        $this->loadTasks(); // Refresh the task list
    }

    /**
     * Delete a task.
     *
     * @param int $id
     */
    public function deleteTask($id)
    {
        $task = Task::findOrFail($id); // Use findOrFail for error handling
        $task->delete();

        $this->loadTasks(); // Refresh the task list
    }

    /**
     * Render the Livewire component view.
     */
    public function render()
    {
        return view('livewire.todo-list')->layout('layouts.app');
    }
}
