<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\UserTask;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    public function index(): JsonResponse
    {
    // Retrieve all usertasks from the database with the user, task, and status relationships
    $userTasks = UserTask::with('user', 'task', 'status')->get();
        
    // Return a JSON response with the retrieved usertask and a 200 status code
    return response()->json([
        'success' => true,
        'data' => $userTasks
    ], 200);
}

    public function show(int $id): JsonResponse
    {
        // Retrieve the usertask with the specified ID from the database with eager loading
        $userTask = UserTask::with('user', 'task', 'status')->find($id);

         // If the usertask was not found, return a 404 status code and an error message
        if (!$userTask) {
            return response()->json([
                'success' => false,
                'message' => 'User task not found'
            ], 404);
        }

        // Return a JSON response with the retrieved usertask and a 200 status code
        return response()->json([
            'success' => true,
            'data' => $userTask
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'user_id' => ['required', 'integer'],
            'task_id' => ['required', 'integer'],
            'due_date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i'],
            'remarks' => ['nullable', 'string', 'max:100'],
            'status_id' => ['required', 'integer']
        ]);

        // Create a new UserTask with the validated data
        $userTask = UserTask::create($validatedData);

        // Eager load the relationships and return a JSON response with the created UserTask and a 201 status code
        $userTask->load(['user', 'task', 'status']);
        return response()->json([
            'success' => true,
            'data' => $userTask
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        // Retrieve the UserTask with the specified ID from the database with eager loading
        $userTask = UserTask::with(['user', 'task', 'status'])->find($id);

         // If the UserTask was not found, return a 404 status code and an error message
        if (!$userTask) {
            return response()->json([
                'success' => false,
                'message' => 'User task not found'
            ], 404);
        }

        // Validate the request data
        $validatedData = $request->validate([
            'user_id' => ['required', 'integer'],
            'task_id' => ['required', 'integer'],
            'due_date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i'],
            'remarks' => ['nullable', 'string', 'max:100'],
            'status_id' => ['required', 'integer']
        ]);
         // Update the UserTask with the validated data
        $userTask->update($validatedData);

        // Return a JSON response with the updated UserTask and a 200 status code
        return response()->json([
            'success' => true,
            'data' => $userTask
        ], 200);
    }

    public function destroy(int $id): JsonResponse
    {
         // Retrieve the UserTask with the specified ID from the database
        $userTask = UserTask::find($id);

        // If the UserTask was not found, return a 404 status code and an error message
        if (!$userTask) {
            return response()->json([
                'success' => false,
                'message' => 'User task not found'
            ], 404);
        }

        $userTask->delete();

        return response()->json([
            'success' => true,
            'message' => 'User task deleted successfully'
        ], 204);
    }
}
