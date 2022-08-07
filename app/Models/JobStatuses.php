<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStatuses extends Model
{
    use HasFactory;

    protected $table = 'job_statuses';
    protected $guarded = false;


    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
