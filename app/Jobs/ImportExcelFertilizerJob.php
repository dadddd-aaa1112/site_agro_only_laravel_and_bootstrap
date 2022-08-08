<?php

namespace App\Jobs;

use App\Imports\FertilizerImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelFertilizerJob implements ShouldQueue
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

        list($part1, $extendsFile) = explode('.', $this->filePath);
        $extendsFile = strtoupper($extendsFile);

        if ($extendsFile == 'XLSX') {
            $readerType = \Maatwebsite\Excel\Excel::XLSX;
        } else if ($extendsFile == 'XLS') {
            $readerType = \Maatwebsite\Excel\Excel::XLS;
        } else if ($extendsFile == 'CSV') {
            $readerType = \Maatwebsite\Excel\Excel::CSV;
        } else if ($extendsFile == 'XML')  {
            $readerType = \Maatwebsite\Excel\Excel::XML;
        } else if ($extendsFile == 'TSV') {
            $readerType = \Maatwebsite\Excel\Excel::TSV;
        } else  {
            $readerType = \Maatwebsite\Excel\Excel::XLSX;
        }

        Excel::import(
            new FertilizerImport(),
            $this->filePath,
            'local',
            $readerType
        );
    }
}
