<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class FertilizerRequest extends FormRequest
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
            'fertilizer_excel' => 'required|file'
        ];
    }

    public function messages() {
        return [
          'fertilizer_excel.required' => 'Загрузить файл Excel',
          'fertilizer_excel.file' => 'Загрузить файл Excel',
        ];
    }
}
