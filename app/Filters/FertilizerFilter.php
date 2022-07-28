<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class FertilizerFilter extends QueryFilter
{

    public function culture_id($id)
    {
        return $this->builder->where('culture_id', $id);
    }


        public function search_field($search_string = ''){
            return $this->builder
                ->where('title', 'LIKE', '%'.$search_string.'%')
                ->orWhere('description', 'LIKE', '%'.$search_string.'%')
                ->orWhere('target', 'LIKE', '%'.$search_string.'%');
        }


}
