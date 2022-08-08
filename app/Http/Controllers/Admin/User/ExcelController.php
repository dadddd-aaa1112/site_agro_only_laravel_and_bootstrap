<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\ExcelRequest;
use App\Jobs\ImportExcelUserJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExcelController extends BaseController
{
    public function __invoke(ExcelRequest $excelRequest)
    {
        $data = $excelRequest->validated();
        $file = $data['user_excel'];
        $filePath = Storage::disk('local')->put('/files', $file);


        try {
            ImportExcelUserJob::dispatch($filePath);
            $this->service->successImport();
            return redirect()
                ->route('admin.user.index')
                ->with('status', 'finished');

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorsMessage = array();
            $errorsRow = array();

            foreach($failures as $failure) {
                array_push($errorsMessage, $failure->errors());
                array_push($errorsRow, $failure->row());
            }

            $this->service->failedImport(array_unique($errorsRow), $errorsMessage);

            ImportExcelUserJob::dispatch($filePath);
            return redirect()
                ->route('admin.user.index')
                ->with('status', 'failed');

        }


    }
}
