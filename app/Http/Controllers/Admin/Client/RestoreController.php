<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class RestoreController extends BaseController
{
    public function restoreData(int $client) {
        Client::onlyTrashed()->find($client)->restore();
        return redirect()->route('admin.client.index');
    }

    public function restoreAll() {
        Client::onlyTrashed()->restore();
        return redirect()->route('admin.client.index');
    }

    public function forceDelete(int $culture) {
        Client::onlyTrashed()->find($culture)->forceDelete();
        return redirect()->route('admin.client.index');
    }
}
