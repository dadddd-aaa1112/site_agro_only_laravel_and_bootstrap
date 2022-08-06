<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\ExcelRequest;
use App\Jobs\ImportExcelUserJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExcelController extends Controller
{
    public function __invoke(ExcelRequest $excelRequest)
    {
        $data = $excelRequest->validated();
        $file = $data['user_excel'];
        $filePath = Storage::disk('local')->put('/files', $file);

        ImportExcelUserJob::dispatch($filePath);

        return redirect()->route('admin.user.index')->with('status', 'Идет загрузка');
    }
}
