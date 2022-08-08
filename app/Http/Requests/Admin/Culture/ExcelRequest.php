<?php

namespace App\Http\Requests\Admin\Culture;

use Illuminate\Foundation\Http\FormRequest;

class ExcelRequest extends FormRequest
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
            'culture_excel' => 'required|file'

        ];
    }

    public function messages() {
        return [
            'culture_excel.required' => 'загрузите Excel файл',
            'culture_excel.file' => 'необходимо загрузить Excel файл'
        ];
    }
}
