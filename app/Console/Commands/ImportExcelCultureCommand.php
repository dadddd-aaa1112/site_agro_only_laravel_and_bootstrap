<?php

namespace App\Console\Commands;

use App\Imports\CulutreImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCultureCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel:culture';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импорт показателей культур';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        Excel::import(new CulutreImport(), public_path('/excel/import/Cultura.xlsx' ));
    }
}
