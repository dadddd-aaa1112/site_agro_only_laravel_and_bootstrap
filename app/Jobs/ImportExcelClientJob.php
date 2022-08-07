<?php

namespace App\Jobs;

use App\Imports\ClientImport;
use App\Imports\CulutreImport;
use App\Models\ImportStatusExcel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Imtigger\LaravelJobStatus\Trackable;
use Maatwebsite\Excel\Facades\Excel;


class ImportExcelClientJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $filePath;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($filePath)
    {

        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Excel::import(new ClientImport(), $this->filePath, 'local', \Maatwebsite\Excel\Excel::XLSX);



//        try {
//           Excel::import(new ClientImport(), $this->filePath, 'local', \Maatwebsite\Excel\Excel::XLSX);
//
//
//                ImportStatusExcel::create([
//                    'type' => 'Клиенты',
//                    'status' => 'успешно загружено',
//                    'user_id' => auth()->user()->id,
//                ]);
//
//        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
//            $failures = $e->failures();
//
//            $errorStatus = array();
//
//            foreach ($failures as $failure) {
//
//                array_push($errorStatus, $failure->row());
//                array_push($errorStatus, $failure->errors());
//
//            }
//
//            ImportStatusExcel::create([
//                'type' => 'Клиенты',
//                'status' => 'загрузка не выполнена',
//                'commentarii' => serialize($errorStatus),
//                'user_id' => auth()->user()->id,
//            ]);
//
//
//        }


    }
}
