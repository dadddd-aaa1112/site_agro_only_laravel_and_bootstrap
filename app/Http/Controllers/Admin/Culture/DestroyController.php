<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Culture $culture)
    {
        $culture->delete();
        return redirect()->route('admin.culture.index');
    }
}
