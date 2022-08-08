<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Fertilizer $fertilizer)
    {
        $cultures = Culture::all();
        return view('admin.fertilizer.edit', compact('fertilizer', 'cultures'));
    }
}
