<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Providers\StatusProvider;

class StatusFactory extends Factory
{
    protected $model = Status::class;

    public function definition(): array
    {
        $statusName = $this->faker->randomElement(['open', 'closed', 'in_progress', 'cancelled']);

        return [
            'name' => $statusName,
        ];
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function configure()
    {
        return $this->afterMaking(function (Status $status) {
            //
        })->afterCreating(function (Status $status) {
            //
        });
    }

    /**
     * Get the provider for the factory.
     *
     * @return array
     */
    public function getProviders()
    {
        return [new StatusProvider($this->faker)];
    }
}
