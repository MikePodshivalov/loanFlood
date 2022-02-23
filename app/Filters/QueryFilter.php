<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter
{
    public $request;
    protected $builder;
    protected $delimiter = ',';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filters()
    {
        return $this->request->query();
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
//                Чтоб использовать множественную фильтрацию как задумывалось типа /?type=ВКЛ,НКЛ
//                в классе QueryFilter.php в методе apply() делаем так
//                call_user_func_array([$this, $name], [array_filter($this->paramToArray($value))]);
//                и уже в методе реализации самого фильтра например в методе type()  меняем where() на whereIn()
            }
        }

        return $this->builder;
    }

    protected function paramToArray($param)
    {
        return explode($this->delimiter, $param);
    }
}

