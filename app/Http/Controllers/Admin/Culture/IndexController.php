<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(Request $request)
    {
        $cultures = Culture::paginate(10);

        if ($request->has('view_deleted')) {
            $cultures = Culture::onlyTrashed()->get();
        }

        return view('admin.culture.index', compact('cultures'));
    }


}
