<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RestoreController extends BaseController
{
    public function restoreData(int $user)
    {
        User::onlyTrashed()->find($user)->restore();
        return redirect()->route('admin.user.index');

    }

    public function restoreAll()
    {
        User::onlyTrashed()->restore();
        return redirect()->route('admin.user.index');
    }

    public function forceDelete(int $user)
    {
        User::onlyTrashed()->find($user)->forceDelete();
        return redirect()->route('admin.user.index');
    }

}
