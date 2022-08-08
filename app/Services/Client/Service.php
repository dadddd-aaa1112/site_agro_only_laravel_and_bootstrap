<?php

namespace App\Services\Client;

use App\Models\ImportStatusExcel;

class Service
{
    public function storeSuccess()
    {
        ImportStatusExcel::create([
            'type' => ImportStatusExcel::TYPE_CLIENT,
            'status' => ImportStatusExcel::STATUS_SUCCESS_IMPORT,
            'user_id' => auth()->user()->id,
        ]);
    }


    public function storeFailed($errorRow, $errorMessage)
    {
        ImportStatusExcel::create([
            'type' => ImportStatusExcel::TYPE_CLIENT,
            'status' => ImportStatusExcel::STATUS_FAILED_IMPORT,
            'commentarii' => [
                'row' => $errorRow,
                'error' => ''
            ],
            'user_id' => auth()->user()->id,
        ]);
    }
}
