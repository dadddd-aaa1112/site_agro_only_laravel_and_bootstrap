<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportStatusExcel extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'import_status_excels';
    protected $casts = [
        'commentarii' => 'array'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
