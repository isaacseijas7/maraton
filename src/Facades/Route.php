<?php

namespace App\Facades;

use App\Core\Facade;

class Route extends Facade
{
    public static function getAccessor()
    {
        return 'router';
    }
}