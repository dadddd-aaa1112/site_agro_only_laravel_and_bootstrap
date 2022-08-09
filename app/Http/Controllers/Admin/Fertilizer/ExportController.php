<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Exports\FertilizerExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function __invoke() {
      return  new FertilizerExport();
    }
}
