<?php

namespace App\Http\Controllers\Admin\Client;

use App\Filters\ClientFilter;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends BaseController
{
    public function __invoke(Request $request, ClientFilter $clientRequest)
    {


        $clients = Client::filter($clientRequest)->sortable()->paginate(10);
        $contractsDateMin = DB::table('clients')->min('contract_date');
        $contractsDateMax = DB::table('clients')->max('contract_date');
        $costMax = DB::table('clients')->max('cost_deliveries');
        $costMin = DB::table('clients')->min('cost_deliveries');
        $regions = Client::all('id', 'region');

        if ($request->has('view_deleted')) {
            $clients = Client::onlyTrashed()->get();
        }

        return view('admin.client.index', compact(
            'clients',
            'contractsDateMin',
            'contractsDateMax',
            'costMax',
            'costMin',
            'regions',
        ));
    }
}

