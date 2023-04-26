<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\StatusResource;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;



class TaskController extends Controller
{
    protected $taskResource;
    protected $statusResource;

    public function __construct(TaskResource $taskResource, StatusResource $statusResource)
    {
        $this->taskResource = $taskResource;
        $this->statusResource = $statusResource;
    }

    public function index(): JsonResponse
    {
        $tasks = Task::with('status')->get();

        return response()->json([
            'data' => $this->taskResource->collection($tasks),
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $task = Task::with('status')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new TaskResource($task)
        ]);
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = Task::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => new TaskResource($task)
        ]);
    }

    public function update(UpdateTaskRequest $request, int $id): JsonResponse
    {
        $task = Task::findOrFail($id);

        $task->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => new TaskResource($task)
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ]);
    }
}
