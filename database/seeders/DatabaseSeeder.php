<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TaskSeeder;
use App\Providers\StatusProvider;
use Database\Seeders\StatusSeeder;
use Faker\Factory as FakerFactory;
use Database\Seeders\UserTaskSeeder;
use Database\Factories\StatusFactory;
use App\Providers\CustomFakerProvider;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();
        $faker->addProvider(new StatusProvider($faker));

        User::factory(10)->create();

        User::factory()->create([
            'name' => 'ian',
            'email' => 'ian@example.com',
        ]);

        // Register factories
        StatusFactory::new();

        // Seeders
        $this->call([
            StatusSeeder::class,
            TaskSeeder::class,
            UserTaskSeeder::class,
        ]);
    }
}
