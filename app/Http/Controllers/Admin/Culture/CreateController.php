<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.culture.create');
    }
}
