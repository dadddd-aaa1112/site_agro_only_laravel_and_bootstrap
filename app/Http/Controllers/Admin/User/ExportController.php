<?php

namespace App\Http\Controllers\Admin\User;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function __invoke() {
        return new UserExport();
    }
}
