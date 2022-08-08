<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class RestoreController extends BaseController
{
    public function restoreTask(int $culture)
    {

        Culture::onlyTrashed()->find($culture)->restore();

        return redirect()->route('admin.culture.index');
    }

    public function restore_all()
    {
        Culture::onlyTrashed()->restore();

        return redirect()->route('admin.index.restore');
    }

    public function forceDelete(int $culture)
    {

        Culture::onlyTrashed()->find($culture)->forceDelete();

        return redirect()->route('admin.culture.index');
    }



}
