<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserTask>
 */
 
 class UserTaskFactory extends Factory
 {
     protected $model = UserTask::class;
 
     public function definition(): array
     {
         $startTime = $this->faker->dateTimeBetween('-1 month', 'now');
         $endTime = $this->faker->dateTimeBetween($startTime, '+1 month');
         $dueDate = $this->faker->dateTimeBetween($startTime, $endTime);
         $remarks = $this->faker->paragraph(1);
         // Limit the remarks to 100 characters
         $remarks = substr($remarks, 0, 100);
 
         return [
             'user_id' => User::inRandomOrder()->first()->id,
             'task_id' => Task::inRandomOrder()->first()->id,
             'due_date' => $dueDate,
             'start_time' => $startTime,
             'end_time' => $endTime,
             'remarks' => $remarks,
             'status_id' => mt_rand(1, 4),
             //'status_id' => $this->faker->optional()->randomDigit(),
         ];
     }
 }
 