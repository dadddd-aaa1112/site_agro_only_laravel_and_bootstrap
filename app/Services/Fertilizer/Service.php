<?php

namespace App\Services\Fertilizer;

use App\Models\ImportStatusExcel;

class Service
{

    public function successImport()
    {
        ImportStatusExcel::create([
            'type' => ImportStatusExcel::TYPE_FERTILIZER,
            'status' => ImportStatusExcel::STATUS_SUCCESS_IMPORT,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function failedImport($errorRow, $errorMessage)
    {
        ImportStatusExcel::create([
            'type' => ImportStatusExcel::TYPE_FERTILIZER,
            'status' => ImportStatusExcel::STATUS_FAILED_IMPORT,
            'commentarii' => [
                'row' => $errorRow,
                'error' => ''
            ],
            'user_id' => auth()->user()->id
        ]);
    }

}
