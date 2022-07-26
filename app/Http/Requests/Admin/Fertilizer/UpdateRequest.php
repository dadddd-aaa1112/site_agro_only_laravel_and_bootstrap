<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'norm_azot' => 'required|numeric',
            'norm_fosfor' => 'required|numeric',
            'norm_kalii' => 'required|numeric',
            'culture_id' => 'required|exists:cultures,id',
            'raion' => 'required|max:255',
            'cost' => 'required|numeric',
            'description' => 'required',
            'target' => 'required',
        ];
    }
}
