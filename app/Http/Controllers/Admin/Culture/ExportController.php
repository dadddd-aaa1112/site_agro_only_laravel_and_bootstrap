<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Exports\CultureExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function __invoke() {
        return new CultureExport();
    }
}
