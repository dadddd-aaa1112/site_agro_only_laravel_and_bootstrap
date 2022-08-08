<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToCollection,
    WithHeadingRow,
    SkipsEmptyRows,
    WithValidation
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $item) {
            if ($item->filter()->isNotEmpty()) {
                User::create([
                    'name' => $item['imia'],
                    'email' => $item['login'],
                    'password' => Hash::make($item['parol']),
                    'role' => $item['rol']
                ]);
            }
        }
    }

    public function rules(): array
    {
        return [
            'imia' => 'required|string',
            'login' => 'required|email',
            'parol' => 'required',

        ];
    }

    public function customValidationMessages()
    {
        return [
            'imia.required' => 'Необходимо заполнить :attribute',
            'login.required' => 'Необходимо заполнить :attribute',
            'parol.required' => 'Необходимо заполнить :attribute',
        ];
    }

}
