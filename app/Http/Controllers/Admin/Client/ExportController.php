<?php

namespace App\Http\Controllers\Admin\Client;

use App\Exports\ClientExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function __invoke() {
        return new ClientExport();
    }
}
