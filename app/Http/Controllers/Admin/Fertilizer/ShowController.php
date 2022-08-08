<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Fertilizer $fertilizer)
    {
        return view('admin.fertilizer.show', compact('fertilizer'));
    }
}
