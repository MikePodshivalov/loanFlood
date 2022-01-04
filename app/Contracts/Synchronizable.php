<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface Synchronizable
{
    public function sync(Collection $tags, Model $model);
}
