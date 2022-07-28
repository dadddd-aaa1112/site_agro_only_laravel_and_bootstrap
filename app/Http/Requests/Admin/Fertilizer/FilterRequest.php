<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'title' => 'string',
            'norm_azot' => 'numeric',
            'norm_fosfor' => 'numeric',
            'norm_kalii' => 'numeric',
            'culture_id' => '',
            'raion' => 'string',
            'cost' => 'numeric',
            'description' => 'string',
            'target' => 'string',
        ];
    }
}
