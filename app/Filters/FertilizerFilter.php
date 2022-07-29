<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class FertilizerFilter extends QueryFilter
{

    public function culture_search($id = null)
    {
        return $this->builder->when($id, function ($query) use ($id) {
            $query->where('culture_id', $id);
        });
    }

    public function raion_search($value = null)
    {
        $search_string = mb_substr($value, 3, 20);

        return $this->builder->when($search_string, function ($query) use ($search_string) {
            $query->where('raion', 'LIKE', '%' . $search_string . '%');

       });
    }

    public function search_field($search_string = '')
    {
        return $this->builder->when($search_string, function ($query) use ($search_string) {
            $query->where('title', 'LIKE', '%' . $search_string . '%');

//            ->orWhere('description', 'LIKE', '%' . $search_string . '%')
//            ->orWhere('target', 'LIKE', '%' . $search_string . '%');
        });
    }

}
