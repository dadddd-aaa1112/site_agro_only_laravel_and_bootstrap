<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\FertilizerRequest;
use App\Jobs\ImportExcelFertilizerJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExcelController extends BaseController
{
    public function __invoke(FertilizerRequest $request) {
        $data = $request->validated();
        $file = $data['fertilizer_excel'];
        $filePath = Storage::disk('local')->put('/files', $file);

        try {
            ImportExcelFertilizerJob::dispatch($filePath);
            $this->service->successImport();
            return redirect()->route('admin.fertilizer.index')->with('status', 'finished');

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorRow = array();
            $errorMessage = array();

            foreach($failures as $failure) {
                array_push($errorRow, $failure->row());
                array_push($errorMessage, $failure->errors());
            }

            $this->service->failedImport(array_unique($errorRow), $errorMessage);
            ImportExcelFertilizerJob::dispatch($filePath);
            return redirect()
                ->route('admin.fertilizer.index')
                ->with('status', 'failed');
        }




    }
}
