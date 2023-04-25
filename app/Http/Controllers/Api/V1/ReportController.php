<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\User;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function tasksByDay(): JsonResponse
    {
        // new query instance for tasks
        $query = Task::query();

        // Call the `prepareDataForBarChart` method to format the data for a bar chart
        return response()->json($this->prepareDataForBarChart($query, 'Tasks By Day', 'created_at'));

    }

    public function tasksByStatus(): JsonResponse
    {
        // Get the tasks grouped by status for the last week
        $tasksByStatus = Status::withCount(['tasks' => function ($query) {
            $query->where('created_at', '>=', Carbon::now()->subWeek());
        }])->get();

        $labels = $tasksByStatus->pluck('name')->toArray();
        $data = $tasksByStatus->pluck('tasks_count')->toArray();

        return response()->json($this->prepareDataForPieChart($labels, $data, 'Tasks By Status'));

    }

    public function tasksByUser(): JsonResponse
    {
        // Get the users and their tasks for the last week
        $tasksByUser = User::withCount(['userTasks' => function ($query) {
            $query->where('created_at', '>=', Carbon::now()->subWeek());
        }])->get();

        // Extract the user email addresses and task counts for use in the pie chart
        $labels = $tasksByUser->pluck('email_address')->toArray();
        $data = $tasksByUser->pluck('tasks_count')->toArray();

        return response()->json($this->prepareDataForPieChart($labels, $data, 'Tasks By User'));
    }

     // This method formats the data for a bar chart
    private function prepareDataForBarChart($query, $label, $column)
    {
        // Get the start date for the chart (30 days ago, or the user-specified date)
        $fromDate = $this->getFromDate() ?: Carbon::now()->subDay(30);
        $query
            ->select([DB::raw("DATE_FORMAT($column, '%Y-%m-%d') AS day"), DB::raw('COUNT(*) AS count')])
            ->whereBetween($column, [$fromDate, Carbon::now()])
            ->groupBy('day');

        $records = $query->get()->keyBy('day');

        // Process for chartjs
        $days = [];
        $labels = [];
        $now = Carbon::now();
        while ($fromDate < $now) {
            $key = $fromDate->format('Y-m-d');
            $labels[] = $key;
            $fromDate = $fromDate->addDay(1);
            $days[] = isset($records[$key]) ? $records[$key]['count'] : 0;
        }

        return [
            'labels' => $labels,
            'datasets' => [[
                'label' => $label,
                'backgroundColor' => '#f87979',
                'data' => $days
            ]]
        ];
    }

    private function prepareDataForPieChart($labels, $data, $title)
{
    return [
        'title' => $title,
        'labels' => $labels,
        'datasets' => [
            [
                'data' => $data,
                'backgroundColor' => [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#33FF66',
                    '#FF5733',
                ],
            ],
        ],
    ];
}

}
