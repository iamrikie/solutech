<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        $status = Status::inRandomOrder()->first();

        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'status_id' => $status ? $status->id : Status::factory()->create()->id,
        ];
    }
}