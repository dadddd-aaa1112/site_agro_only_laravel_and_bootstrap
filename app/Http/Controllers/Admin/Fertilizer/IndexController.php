<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Filters\FertilizerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Models\Culture;
use App\Models\Fertilizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends BaseController
{
    public function __invoke(Request $request, FertilizerFilter $filterRequest, FilterRequest $fromRequest)
    {

        $fertilizers = Fertilizer::with('cultures')
            ->filter($filterRequest)
            ->sortable()
            ->paginate(10);
        $normAzotMax = DB::table('fertilizers')->max('norm_azot');
        $normAzotMin = DB::table('fertilizers')->min('norm_azot');
        $normFostorMax = DB::table('fertilizers')->max('norm_fosfor');
        $normFostorMin = DB::table('fertilizers')->min('norm_fosfor');
        $normKaliiMax = DB::table('fertilizers')->max('norm_kalii');
        $normKaliiMin = DB::table('fertilizers')->min('norm_kalii');
        $normCostMax = DB::table('fertilizers')->max('cost');
        $normCostMin = DB::table('fertilizers')->min('cost');

        $cultures = Culture::all();
        $raions = Fertilizer::all();




        if ($request->has('view_deleted')) {
            $fertilizers = Fertilizer::onlyTrashed()->get();
        }

        return view('admin.fertilizer.index', compact(
            'fertilizers',
            'normAzotMax',
            'normAzotMin',
            'normFostorMax',
            'normFostorMin',
            'normKaliiMax',
            'normKaliiMin',
            'normCostMax',
            'normCostMin',
            'cultures',
            'raions',


        ));

    }
}
