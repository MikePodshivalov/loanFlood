<?php

namespace App\Filters;

class LoanFilter extends QueryFilter
{
    public function type($type = null)
    {
        return $this->builder->when($type, function ($query) use ($type) {
            $query->where('type', $type);
        });
    }

    public function search_name($search = '')
    {
        return $this->builder
            ->where('name', 'LIKE', '%' . $search . '%');
    }

    public function amount($param)
    {

    }

    public function KK($param)
    {

    }

    public function simple_status($status = null)
    {
        return $this->builder->when($status, function ($query) use ($status) {
            $query
                ->join('statuses', 'loans.id', '=', 'statuses.loan_id')
                ->where('simple_status', $status);
        });
    }
}
