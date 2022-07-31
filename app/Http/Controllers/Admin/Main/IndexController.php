<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Culture;
use App\Models\Fertilizer;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $clients = Client::all()->count();
        $users = User::all()->count();
        $cultures = Culture::all()->count();
        $fertilizers = Fertilizer::all()->count();
        return view('admin.main.index', compact('clients', 'users', 'cultures', 'fertilizers'));
    }
}
