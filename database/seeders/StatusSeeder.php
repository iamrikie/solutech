<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Database\Factories\StatusFactory;

class StatusSeeder extends Seeder
{
    /**
     * Seed the statuses table.
     *
     * @return void
     */
    public function run()
    {
        Status::factory(10)->create();
    }
}


