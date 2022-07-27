<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function __invoke(Request $request)
   {
       $fertilizers = Fertilizer::all();

       if ($request->has('view_deleted')) {
           $fertilizers = Fertilizer::onlyTrashed()->get();
       }

       return view('admin.fertilizer.index', compact('fertilizers'));

   }
}
