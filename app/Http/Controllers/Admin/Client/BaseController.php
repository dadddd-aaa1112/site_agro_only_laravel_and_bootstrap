<?php

namespace App\Http\Controllers\Admin\Client;

use App\Services\Client\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
