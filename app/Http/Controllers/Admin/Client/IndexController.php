<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $clients = Client::all();

        if ($request->has('view_deleted')) {
            $clients = Client::onlyTrashed()->get();
        }

        return view('admin.client.index', compact('clients'));
    }
}

