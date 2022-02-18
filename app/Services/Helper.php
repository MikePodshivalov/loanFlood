<?php

namespace App\Services;

use Illuminate\Support\Carbon;

class Helper
{
    public static function ReverseDate($date) : string
    {
        return Carbon::createFromDate($date)->format('d.m.Y');
    }
}
