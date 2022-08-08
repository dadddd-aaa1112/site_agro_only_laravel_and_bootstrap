<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $cultures = Culture::all();

        return view('admin.fertilizer.create', compact('cultures'));
    }
}
