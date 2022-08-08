<?php

namespace App\Services\Fertilizer;

use App\Models\ImportStatusExcel;

class Service
{

    public function successImport()
    {
        ImportStatusExcel::create([
            'type' => 'Удобрения',
            'status' => 'успешно загружено',
            'user_id' => auth()->user()->id,
        ]);
    }

    public function failedImport($errorRow, $errorMessage)
    {
        ImportStatusExcel::create([
            'type' => 'Удобрения',
            'status' => 'загрузка не выполнена',
            'commentarii' => [
                'row' => $errorRow,
                'error' => ''
            ],
            'user_id' => auth()->user()->id
        ]);
    }

}
