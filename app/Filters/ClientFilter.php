<?php


namespace App\Filters;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends QueryFilter
{


    public function title_search($search_string = '')
    {
        return $this->builder->when($search_string, function ($query) use ($search_string) {
            $query->where('title', 'LIKE', '%' . $search_string . '%');
        });
    }

    public function date_min($value = '1990-01-01')
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('contract_date', '>=', $value);
        });
    }


    public function date_max($value = null)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('contract_date', '<=', $value);
        });
    }

    public function cost_min($value = 0)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('cost_deliveries', '>=', $value);
        });
    }

    public function cost_max($value = 99999999999)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('cost_deliveries', '<=', $value);
        });
    }

    public function region_search($values = null)
    {
        return $this->builder->when($values, function ($query) use ($values) {
            $query->whereIn('id', $values);
        });
    }


}
