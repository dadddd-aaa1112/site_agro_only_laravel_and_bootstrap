<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    public function __invoke(Fertilizer $fertilizer)
    {
        $fertilizer->delete();
        return redirect()->route('admin.fertilizer.index');
    }
}
