<?php

namespace App\Services\Client;

use App\Models\ImportStatusExcel;

class Service
{
    public function storeSuccess()
    {
        ImportStatusExcel::create([
            'type' => 'Клиенты',
            'status' => 'успешно загружено',
            'user_id' => auth()->user()->id,
        ]);
    }


    public function storeFailed($errorRow, $errorMessage)
    {
        ImportStatusExcel::create([
            'type' => 'Клиенты',
            'status' => 'загрузка не выполнена',
            'commentarii' => [
                'row' => $errorRow,
                'error' => ''
            ],
            'user_id' => auth()->user()->id,
        ]);
    }
}
