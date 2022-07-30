<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class FertilizerFilter extends QueryFilter
{

    public function culture_search($id = null)
    {
        return $this->builder->when($id, function ($query) use ($id) {
            $query->whereIn('culture_id', $id);

        });
    }

    public function raion_search($value = null)
    {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->whereIn('id', $value);
       });
    }

    public function search_field($search_string = '')
    {
        return $this->builder->when($search_string, function ($query) use ($search_string) {
            $query->where('title', 'LIKE', '%' . $search_string . '%')
           ->orWhere('description', 'LIKE', '%' . $search_string . '%')
           ->orWhere('target', 'LIKE', '%' . $search_string . '%');
        });
    }

//    public function norm_azota_field($value = null) {
//        $minValue = 0;
//        $maxValue = $value;
//        return $this->builder->where('norm_azot', '>=', $minValue)
//            ->where('norm_azot', '<=', $maxValue);
//    }

    public function cost_min($value = 0) {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('cost', '>=', $value);
        });
    }

    public function cost_max($value = 999999999999) {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('cost', '<=', $value);
        });
    }

    public function azot_min($value = 0) {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_azot', '>=', $value);
        });
    }

    public function azot_max($value = 999999999999) {
        return $this->builder->when($value, function ($query) use ($value) {
                $query->where('norm_azot', '<=', $value);
            });
    }

    public function fosfor_min($value = 0) {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_fosfor', '>=', $value);
        });
    }

    public function fosfor_max($value = 999999999999) {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_fosfor', '<=', $value);
        });
    }

    public function kalii_min($value = 0) {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_kalii', '>=', $value);
        });
    }

    public function kalii_max($value = 999999999999) {
        return $this->builder->when($value, function ($query) use ($value) {
            $query->where('norm_kalii', '<=', $value);
        });
    }

}
