<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\UpdateRequest;
use App\Models\Culture;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Culture $culture)
    {
        $data = $request->validated();
        $culture->update($data);
        return view('admin.culture.show', compact('culture'));
    }
}
