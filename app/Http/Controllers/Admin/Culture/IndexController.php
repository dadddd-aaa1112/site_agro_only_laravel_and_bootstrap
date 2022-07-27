<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $cultures = Culture::all();

        if ($request->has('view_deleted')) {
            $cultures = Culture::onlyTrashed()->get();
        }

        return view('admin.culture.index', compact('cultures'));
    }


}
