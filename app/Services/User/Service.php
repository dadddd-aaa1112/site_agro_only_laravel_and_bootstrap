<?php

namespace App\Services\User;

use App\Models\ImportStatusExcel;

class Service
{
    public function successImport()
    {
        ImportStatusExcel::create([
            'type' => 'Пользователи',
            'status' => 'успешно загружено',
            'user_id' => auth()->user()->id,
        ]);
    }

    public function failedImport($errorsRow, $errorsMessage)
    {
        ImportStatusExcel::create([
            'type' => 'Пользователи',
            'status' => 'загрузка не выполнена',
            'commentarii' => [
                'row' => $errorsRow,
                'error' => ''
            ],
            'user_id' => auth()->user()->id,
        ]);
    }
}
