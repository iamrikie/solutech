<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\User;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function activeTasks(): JsonResponse
    {
        $activeTasks = Task::where('status_id', '!=', Status::where('name', 'Closed')->first()->id)->count();

        return response()->json([
            'success' => true,
            'data' => $activeTasks
        ]);
    }

    public function completedTasks(): JsonResponse
    {
        $completedTasks = Task::where('status_id', Status::where('name', 'Closed')->first()->id)->count();

        return response()->json([
            'success' => true,
            'data' => $completedTasks
        ]);
    }

    public function overdueTasks(): JsonResponse
    {
        $overdueTasks = Task::where('due_date', '<', Carbon::now())->count();

        return response()->json([
            'success' => true,
            'data' => $overdueTasks
        ]);
    }

    public function latestTasks(): JsonResponse
    {
        $latestTasks = TaskResource::collection(
            Task::with(['status'])
                ->orderByDesc('created_at')
                ->limit(10)
                ->get()
        );

        return response()->json([
            'success' => true,
            'data' => $latestTasks
        ]);
    }

    public function tasksByStatus(): JsonResponse
    {
        $tasksByStatus = Status::withCount(['tasks' => function ($query) {
            $query->where('created_at', '>=', Carbon::now()->subWeek());
        }])->get();

        return response()->json([
            'success' => true,
            'data' => $tasksByStatus
        ]);
    }

    public function tasksByUser(): JsonResponse
    {
        $users = User::where('created_at', '>=', Carbon::now()->subWeek())->get();
        return response()->json([
            'success' => true,
            'data' => $users
        ], 200);
    }

}
