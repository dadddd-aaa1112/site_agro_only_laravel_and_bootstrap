<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\UpdateRequest;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Fertilizer $fertilizer)
    {
        $data = $request->validated();
        $fertilizer->update($data);
        return view('admin.fertilizer.show', compact('fertilizer'));
    }
}
