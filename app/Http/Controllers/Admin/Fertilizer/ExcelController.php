<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\FertilizerRequest;
use App\Jobs\ImportExcelFertilizerJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExcelController extends Controller
{
    public function __invoke(FertilizerRequest $request) {
        $data = $request->validated();
        $file = $data['fertilizer_excel'];
        $filePath = Storage::disk('local')->put('/files', $file);

        ImportExcelFertilizerJob::dispatch($filePath);

        return redirect()->route('admin.fertilizer.index')->with('status', 'идет загрузка');
    }
}
