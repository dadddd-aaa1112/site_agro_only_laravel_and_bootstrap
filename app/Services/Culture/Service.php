<?php

namespace App\Services\Culture;

use App\Models\ImportStatusExcel;

class Service
{
    public function successImport()
    {
        ImportStatusExcel::create([
            'type' => 'Культуры',
            'status' => 'успешно загружено',
            'user_id' => auth()->user()->id,
        ]);
    }

    public function failedImport($errorRow)
    {
        ImportStatusExcel::create([
            'type' => 'Культуры',
            'status' => 'загрузка не выполнена',
            'commentarii' => [
                'row' => $errorRow,
                'error' => ''
            ],
            'user_id' => auth()->user()->id,
        ]);
    }
}
