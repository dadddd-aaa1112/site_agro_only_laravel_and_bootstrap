<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Requests\Import\Client\FailedRequest;
use App\Http\Requests\Import\Client\SuccessRequest;
use App\Imports\ClientImport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\ExcelRequest;
use App\Jobs\ImportExcelClientJob;
use App\Models\ImportStatusExcel;
use App\Models\JobStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Imtigger\LaravelJobStatus\JobStatus;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends BaseController
{


    public function __invoke(ExcelRequest $excelRequest)
    {
        $data = $excelRequest->validated();
        $file = $data['client_excel'];

        $filePath = Storage::disk('local')->put('/files', $file);

        //imTigger laravel
//        $job = new ImportExcelClientJob($filePath);
//        $this->dispatch($job);
//        $jobStatusId = $job->getJobStatusId();
//        $jobStatus = JobStatus::find($jobStatusId);
//        $jobStatus->user_id = auth()->user()->id;
//        $jobStatus->save();


        try {
            ImportExcelClientJob::dispatch($filePath);

            $this->service->storeSuccess($data);

            return redirect()
                ->route('admin.client.index')->with('status', 'finished');;

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {

            $failures = $e->failures();
            $errorRow = array();
            $errorMessage = array();

            foreach ($failures as $failure) {
               // $errorStatus[$failure->row()] = $failure->errors();
                array_push($errorRow, $failure->row());
                array_push($errorMessage, $failure->errors());
            }

            $this->service->storeFailed(array_unique($errorRow), $errorMessage);

            ImportExcelClientJob::dispatch($filePath);

            return redirect()
                ->route('admin.client.index')->with('status', 'failed');
        }


    }
}
