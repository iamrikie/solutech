<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * The Seeder classes that this Seeder depends on.
     *
     * @var array
     */
    protected $depends = [
        StatusSeeder::class,
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory(10)->create();
    }
}
