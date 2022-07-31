<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $guarded = false;
    protected $table = 'clients';
    protected $dates = ['deleted_at'];
    public $sortable = ['title', 'cost_deliveries'];


    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }

}
