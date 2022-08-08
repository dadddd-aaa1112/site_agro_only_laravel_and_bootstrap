<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\StoreRequest;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Fertilizer::firstOrCreate([
            'title' => $data['title']
        ], $data);
        return redirect()->route('admin.fertilizer.index');
    }
}
