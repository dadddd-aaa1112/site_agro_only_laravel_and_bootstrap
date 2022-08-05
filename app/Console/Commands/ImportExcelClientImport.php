<?php

namespace App\Console\Commands;

use App\Imports\ClientImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelClientImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:import:client';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'импорт показателей';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        $filePath = public_path('/excel/import/second.xlsx');
        Excel::import(new ClientImport(), $filePath,);

    }
}
