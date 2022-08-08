<?php

namespace App\Http\Requests\Admin\Client;

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
            'client_excel' => 'required|file'
        ];
    }

    public function messages() {
        return [
            'client_excel.required' => 'Необходимо загрузить Excel файл',
            'client_excel.file' => 'Необходимо загрузить Excel файл'
        ];
    }
}
