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


    const TYPE_CLIENT = 1;
    const TYPE_CULTURE = 2;
    const TYPE_FERTILIZER = 3;
    const TYPE_USER = 4;

    public static function getType()
    {
        return [
            self::TYPE_CLIENT => 'Клиенты',
            self::TYPE_CULTURE => 'Культуры',
            self::TYPE_FERTILIZER => 'Удобрения',
            self::TYPE_USER => 'Пользователи'

        ];
    }

    const STATUS_SUCCESS_IMPORT = 1;
    const STATUS_FAILED_IMPORT = 2;

    public static function getStatusImport()
    {
        return [
            self::STATUS_SUCCESS_IMPORT => 'Успешно загружены данные',
            self::STATUS_FAILED_IMPORT => 'Сбой загрузки данных'
        ];
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
