<?php

namespace App\Http\Controllers\Admin\Client;

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

class ExcelController extends Controller
{
    public function __invoke(ExcelRequest $excelRequest)
    {
        $data = $excelRequest->validated();
        $file = $data['client_excel'];

        $filePath = Storage::disk('local')->put('/files', $file);

//        $job = new ImportExcelClientJob($filePath);
//        $this->dispatch($job);
//        $jobStatusId = $job->getJobStatusId();
//        $jobStatus = JobStatus::find($jobStatusId);
//        $jobStatus->user_id = auth()->user()->id;
//        $jobStatus->save();


        try {
            ImportExcelClientJob::dispatch($filePath);

            ImportStatusExcel::create([
                'type' => 'Клиенты',
                'status' => 'успешно загружено',
                'user_id' => auth()->user()->id,
            ]);

            return redirect()
                ->route('admin.client.index')->with('status', 'finished');;

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {

            $failures = $e->failures();
            $errorStatus = array();

            foreach ($failures as $failure) {
                array_push($errorStatus, $failure->row());
                array_push($errorStatus, $failure->errors());
            }

            ImportStatusExcel::create([
                'type' => 'Клиенты',
                'status' => 'загрузка не выполнена',
                'commentarii' => serialize($errorStatus),
                'user_id' => auth()->user()->id,
            ]);

            ImportExcelClientJob::dispatch($filePath);

            return redirect()
                ->route('admin.client.index')->with('status', 'failed');
        }



    }
}
