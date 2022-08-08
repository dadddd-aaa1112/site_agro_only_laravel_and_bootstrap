<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\ExcelRequest;
use App\Jobs\ImportExcelCultureJob;
use App\Services\Culture\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Validators\ValidationException;

class ExcelController extends BaseController
{
    public function __invoke(ExcelRequest $excelRequest, Service $service)
    {
        $data = $excelRequest->validated();




        $file = $data['culture_excel'];
        $filePath = Storage::disk('local')->put('/files', $file);

        try {
            ImportExcelCultureJob::dispatch($filePath);
            $this->service->successImport();;
            return redirect()->route('admin.culture.index')->with('status', 'finished');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorRow = array();
            $errorMessage = array();

            foreach ($failures as $failure) {
                array_push($errorRow, $failure->row());
                array_push($errorMessage, $failure->errors());
            }

            $this->service->failedImport(array_unique($errorRow));

            ImportExcelCultureJob::dispatch($filePath);

            return redirect()->route('admin.culture.index')->with('status', 'failed');
        }



    }
}
