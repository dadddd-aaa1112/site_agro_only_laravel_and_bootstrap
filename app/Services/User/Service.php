<?php

namespace App\Services\User;

use App\Models\ImportStatusExcel;

class Service
{
    public function successImport()
    {
        ImportStatusExcel::create([
            'type' => ImportStatusExcel::TYPE_USER,
            'status' => ImportStatusExcel::STATUS_SUCCESS_IMPORT,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function failedImport($errorsRow, $errorsMessage)
    {
        ImportStatusExcel::create([
            'type' => ImportStatusExcel::TYPE_USER,
            'status' => ImportStatusExcel::STATUS_FAILED_IMPORT,
            'commentarii' => [
                'row' => $errorsRow,
                'error' => ''
            ],
            'user_id' => auth()->user()->id,
        ]);
    }
}
