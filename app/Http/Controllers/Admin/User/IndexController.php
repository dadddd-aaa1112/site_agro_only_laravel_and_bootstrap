<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $roles = User::getRoles();
        $users = User::all();

        if ($request->has('view_deleted')) {
            $users = User::onlyTrashed()->get();
        }

        return view('admin.user.index', compact('roles', 'users'));
    }
}
