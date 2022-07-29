<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class Fertilizer extends Model
{

    use HasFactory;
    use SoftDeletes;


    protected $guarded = false;
    protected $table = 'fertilizers';
    protected $dates = ['deleted_at'];

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }

    public function cultures() {
        return $this->belongsTo(Culture::class, 'culture_id', 'id');
    }
}
