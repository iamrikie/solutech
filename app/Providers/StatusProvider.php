<?php

namespace App\Providers;

use Faker\Provider\Base;

class StatusProvider extends Base
{
    protected static $statuses = [
        'open',
        'closed',
        'in_progress',
        'cancelled',
    ];

    public function status(): string
    {
        return $this->randomElement(self::$statuses);
    }
}
