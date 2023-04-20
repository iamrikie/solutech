<?php

namespace Database\Seeders;

use App\Models\UserTask;
use Illuminate\Database\Seeder;

class UserTaskSeeder extends Seeder
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
        UserTask::factory(10)->create();
    }
}
