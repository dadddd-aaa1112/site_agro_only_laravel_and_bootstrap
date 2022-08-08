<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Culture $culture)
    {
        return view('admin.culture.show', compact('culture'));
    }
}
