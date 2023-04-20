<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        // Retrieve all statuses from the database
        $statuses = Status::all();

        // Return a JSON response with the retrieved statuses and a 200 status code
        return response()->json([
            'success' => true,
            'data' => $statuses
        ], 200);
    }


    public function show($id): JsonResponse
    {
        // Retrieve the status with the specified ID from the database
        $status = Status::find($id);

        // If the status was not found, return a 404 status code and an error message
        if (!$status) {
            return response()->json([
                'success' => false,
                'message' => 'Status not found'
            ], 404);
        }

        // Return a JSON response with the retrieved status and a 200 status code
        return response()->json([
            'success' => true,
            'data' => $status
        ], 200);
    }


    public function store(Request $request): JsonResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Create a new status with the validated data
        $status = Status::create($validatedData);

        // Return a JSON response with the created status and a 201 status code
        return response()->json([
            'success' => true,
            'data' => $status
        ], 201);
    }


    public function update(Request $request, $id): JsonResponse
    {
        // Retrieve the status with the specified ID from the database
        $status = Status::find($id);

        // If the status was not found, return a 404 status code and an error message
        if (!$status) {
            return response()->json([
                'success' => false,
                'message' => 'Status not found'
            ], 404);
        }

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Update the status with the validated data
        $status->update($validatedData);

        // Return a JSON response with the updated status and a 200 status code
        return response()->json([
            'success' => true,
            'data' => $status
        ], 200);
    }


    public function destroy($id): JsonResponse
    {
        // Retrieve the status with the specified ID from the database
        $status = Status::find($id);

        // If the status was not found, return a 404 status code and an error message
        if (!$status) {
            return response()->json([
                'success' => false,
                'message' => 'Status not found'
            ], 404);
        }

        $status->delete();

        return response()->json([
            'success' => true,
            'message' => 'Status deleted successfully'
        ], 204);
    }
}