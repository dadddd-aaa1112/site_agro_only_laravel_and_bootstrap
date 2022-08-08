<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
   public function __invoke(Client $client)
   {
       $client->delete();
       return redirect()->route('admin.client.index');
   }
}
