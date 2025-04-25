<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10 space-y-6">
    <h1 class="text-2xl font-bold text-gray-800">My Todos</h1>

    {{-- Add New Task Form --}}
    <form wire:submit.prevent="addNewTodo" name='add-form' id='add-form'>
        <div class="flex items-center gap-3">
            <input wire:model="title" id="new-task-title" type="text" placeholder="Enter a new task..."
                class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">

            <button type="submit"
                class="px-4 py-2 rounded-md transition text-white
           bg-blue-600 hover:bg-blue-700
           disabled:bg-gray-400 disabled:cursor-not-allowed"
                :disabled="!$wire.title" wire:loading.attr="disabled">
                Add
            </button>
        </div>
        {{-- loading.delay   --}}
        <div wire:loading wire:target="addNewTodo">
            <span class="text-green-600 text-sm">
                Loading ...
            </span>
        </div>
        <div>
            @error('title')
                <div class="error text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </form>

    {{-- Task List --}}

    @foreach ([
        'Pending Tasks' => ['data' => $pendingTasks['data'], 'count' => $pendingTasks['count'], 'color' => 'text-yellow-600'],
        'In Progress' => ['data' => $inProgressTasks['data'], 'count' => $inProgressTasks['count'], 'color' => 'text-blue-600'],
        'Completed Tasks' => ['data' => $completedTasks['data'], 'count' => $completedTasks['count'], 'color' => 'text-green-600'],
    ] as $label => $group)
        @if ($group['data']->count())
            <div>
                <h2 class="text-xs font-semibold mt-6 {{ $group['color'] }}">
                    {{ $label }} ({{ $group['count'] }})
                </h2>
                <ul class="divide-y divide-gray-200 mt-2">
                    @foreach ($group['data'] as $task)
                        <li class="flex justify-between items-center py-2" id="task-{{ $task->id }}">
                            <div class="flex items-center gap-3 flex-1">
                                @if ($isVisible && $updatedTask && $updatedTask->id === $task->id)
                                    <input wire:model="updatedTaskTitle" type="text" id="updatedTaskTitle"
                                        name="updatedTaskTitle"
                                        class="flex-1 px-2 mr-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" />
                                @else
                                    <span class="text-gray-800">{{ $task->title }}</span>
                                @endif
                            </div>

                            <div class="flex gap-2 items-center">
                                @if ($isVisible && $updatedTask && $updatedTask->id === $task->id)
                                    <button wire:click="updateTask"
                                        class="px-2 py-1 bg-green-600 cursor-pointer text-white text-sm rounded hover:bg-green-700 transition">
                                        Update
                                    </button>
                                    <button wire:click="cancelUpdate"
                                        class="px-2 py-1 bg-red-500 cursor-pointer text-white text-sm rounded hover:bg-red-600 transition">
                                        Cancel
                                    </button>
                                @else
                                    @if ($task->status === 'pending')
                                        <button wire:click="changeTaskStatus({{ $task->id }}, 'in_progress')"
                                            class="text-yellow-600 hover:text-yellow-800 text-sm transition cursor-pointer">
                                            Start
                                        </button>
                                    @elseif ($task->status === 'in_progress')
                                        <button wire:click="changeTaskStatus({{ $task->id }}, 'completed')"
                                            class="text-green-600 hover:text-green-800 text-sm transition cursor-pointer">
                                            Complete
                                        </button>
                                    @endif

                                    {{-- Edit / Delete --}}
                                    <button wire:click="updateTask({{ $task->id }})"
                                        class="text-blue-600 hover:text-blue-800 text-sm transition cursor-pointer">
                                        Edit
                                    </button>

                                    <button wire:click="deleteItem({{ $task->id }})"
                                        wire:wire:confirm="Are you sure you want to delete this task?"
                                        class="text-red-600 hover:text-red-800 cursor-pointer text-sm transition">
                                        Delete
                                    </button>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{-- Pagination for each group --}}
                <div class="mt-4">
                    {{ $group['data']->links() }}
                </div>
            </div>
        @endif
    @endforeach

</div>

{{--
    -I learned about session
    -I learned about flash messages
    -I learned about wire:loading
    -I learned about pagination
    -I learned about error handling
    -I learned about data binding and passing associated data to a view in Laravel
    -I am learning about Events => communicate between components
--}}
