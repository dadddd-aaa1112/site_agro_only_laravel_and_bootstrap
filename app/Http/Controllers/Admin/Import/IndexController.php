<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use App\Models\JobStatuses;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $imports = JobStatuses::paginate(10);
        return view('admin.import.index', compact('imports'));
    }
}
