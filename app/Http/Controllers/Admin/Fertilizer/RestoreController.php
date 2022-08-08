<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class RestoreController extends BaseController
{
    public function restoreData(int $fertilizer)
    {
        Fertilizer::onlyTrashed()->find($fertilizer)->restore();
        return redirect()->route('admin.fertilizer.index');
    }

    public function restoreAll()
    {
        Fertilizer::onlyTrashed()->restore();
        return redirect()->route('admin.fertilizer.index');
    }

    public function forceDelete(int $fertilizer)
    {
        Fertilizer::onlyTrashed()->find($fertilizer)->forceDelete();
        return redirect()->route('admin.fertilizer.index');

    }
}
