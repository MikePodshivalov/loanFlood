<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Helper
{
    public static function ReverseDate($date) : string
    {
        return Carbon::createFromDate($date)->format('d.m.Y');
    }

    public static function getNameRoleInRussian(string $name)
    {
        switch ($name) {
            case 'IAB':
                return 'ИАБ';
            case 'PD':
                return 'ПД';
            case 'ZS':
                return 'ЗС';
        }
        return false;
    }
}
