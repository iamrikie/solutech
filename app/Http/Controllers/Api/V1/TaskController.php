<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;
// use App\Models\Status;

// class TaskController extends Controller
// {
//     public function index()
//     {
//         $tasks = Task::with('status')->get();

//         return view('tasks.index', compact('tasks'));
//     }

//     public function create()
//     {
//         $statuses = Status::all();

//         return view('tasks.create', compact('statuses'));
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'name' => 'required|string|max:255',
//             'description' => 'nullable|string',
//             'due_date' => 'nullable|date',
//             'status_id' => 'required|exists:statuses,id'
//         ]);

//         $task = Task::create($validatedData);

//         return redirect()->route('tasks.show', $task);
//     }

//     public function show(Task $task)
//     {
//         $task->load('status');

//         return view('tasks.show', compact('task'));
//     }

//     public function edit(Task $task)
//     {
//         $statuses = Status::all();

//         return view('tasks.edit', compact('task', 'statuses'));
//     }

//     public function update(Request $request, Task $task)
//     {
//         $validatedData = $request->validate([
//             'name' => 'required|string|max:255',
//             'description' => 'nullable|string',
//             'due_date' => 'nullable|date',
//             'status_id' => 'required|exists:statuses,id'
//         ]);

//         $task->update($validatedData);

//         return redirect()->route('tasks.show', $task);
//     }

//     public function destroy(Task $task)
//     {
//         $task->delete();

//         return redirect()->route('tasks.index');
//     }
// }

namespace App\Http\Controllers\ApI\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $tasks = Task::with('status')->get();

        return response()->json([
            'success' => true,
            'data' => $tasks
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $task = Task::with('status')->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Task not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $task
        ]);
    }

    public function create(): JsonResponse
    {
        $statuses = Status::all();

        return response()->json([
            'success' => true,
            'data' => $statuses
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status_id' => 'required|exists:statuses,id'
        ]);

        $task = Task::create($validatedData);

        return response()->json([
            'success' => true,
            'data' => $task,
            'message' => 'Task created successfully'
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Task not found'
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status_id' => 'required|exists:statuses,id'
        ]);

        $task->update($validatedData);

        return response()->json([
            'success' => true,
            'data' => $task,
            'message' => 'Task updated successfully'
        ]);
    }

    public function edit(int $id): JsonResponse
    {
        $task = Task::with('status')->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Task not found'
            ], 404);
        }

        $statuses = Status::all();

        return response()->json([
            'success' => true,
            'data' => [
                'task' => $task,
                'statuses' => $statuses
            ]
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Task not found'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ], 204);
    }
}
