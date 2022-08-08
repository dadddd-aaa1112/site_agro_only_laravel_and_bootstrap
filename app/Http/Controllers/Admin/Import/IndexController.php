<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use App\Models\ImportStatusExcel;
use App\Models\JobStatuses;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $imports = ImportStatusExcel::paginate(10);
        $types = ImportStatusExcel::getType();
        $statuses = ImportStatusExcel::getStatusImport();

        return view('admin.import.index', compact(
            'imports',
            'types',
            'statuses'
            )
        );
    }
}
