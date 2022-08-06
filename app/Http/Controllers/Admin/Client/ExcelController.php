<?php

namespace App\Http\Controllers\Admin\Client;

use App\Imports\ClientImport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\ExcelRequest;
use App\Jobs\ImportExcelClientJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function __invoke(ExcelRequest $excelRequest) {
        $data = $excelRequest->validated();
        $file = $data['client_excel'];

        $filePath = Storage::disk('local')->put('/files', $file);

        ImportExcelClientJob::dispatch($filePath);


        return redirect()->route('admin.client.index')->with('status', 'происходит загрузка');
    }
}
