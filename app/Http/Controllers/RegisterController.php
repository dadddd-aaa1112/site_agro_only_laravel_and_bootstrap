<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke()
    {
        $roles = User::getRoles();
        return view('register', compact('roles'));
    }
}
