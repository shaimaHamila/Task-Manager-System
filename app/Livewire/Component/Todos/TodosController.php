<?php

namespace App\Livewire\Component\Todos;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class TodosController extends Component
{
    use WithPagination;
    public ?Task $newTask = null;
    public string $title;
    public ?Task $updatedTask = null;
    public bool $isVisible = false;
    public string $updatedTaskTitle = '';

    /**
     * Get all todos for the authenticated user.
     * @param string|null $status
     * @return  array
     */

    public function getUserTodos(?string $status= null){
        $query = Task::where('user_id', Auth::id());
        if ($status) {
            $query->where('status', $status);
        }
        return ["data"=> $query->latest()->paginate(3), "count"=> $query->count()];

    }
    /**
     * Add a new todo task.
     */
    public function addNewTodo()
    {
        // Validate the form
        $this->validate([
            'title' => 'required|string|max:50',
        ]);
        if(Auth::check() ){

            // Add the task
            Task::create([
                'title' => $this->title,
                'user_id' => Auth::id(),
                'is_completed' => false
            ]);
        } else {

            session()->flash('error', 'You must be logged in to add a todo.');
        }

        // Reset the form after task creation
        $this->reset(['title', 'newTask']);
    }

    /**
     * Delete a todo item by ID.
     *
     * @param int $itemId
     */
    public function deleteItem(int $itemId)
    {
        $task = Task::find($itemId);
        if ($task) {
            $task->delete();
        }
    }

    /**
     * Edit a selected todo item.
     */
    public function updateTask(?int $taskId = null)
    {
        // If a task ID is passed, show the edit form
        if ($taskId) {
            $this->updatedTask = Task::find($taskId);
            $this->isVisible = true;
            $this->updatedTaskTitle = $this->updatedTask->title;
            return;
        }

        // Otherwise, update the task
        if ($this->updatedTask && $this->updatedTask->id) {
            Task::where('id', $this->updatedTask->id)->update([
                'title' => $this->updatedTaskTitle,
                'is_completed' => $this->updatedTask->is_completed ?? false,
            ]);
            $this->isVisible = false;
        }

    }
    public function toggleComplete($taskId)
    {
        $task = Task::find($taskId);
        if ($task  ) {
            $task->is_completed = !$task->is_completed;
            $task->save();
        }
    }
      public function changeTaskStatus($taskId, $status)
    {
        $task = Task::find($taskId);
        if ($task  ) {
            $task->status = $status;
            $task->save();
        }
    }

    public function cancelUpdate()
    {
        $this->reset(['updatedTask', 'isVisible']);
    }

    /**
     * Render the Livewire component view.
     */
    public function render()
    {
        return view('livewire.pages.todos.todos',[
            'pendingTasks' => $this->getUserTodos('pending'),
            'inProgressTasks' => $this->getUserTodos('in_progress'),
            'completedTasks' => $this->getUserTodos('completed'),
        ]);
    }
}
