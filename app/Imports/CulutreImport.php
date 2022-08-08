<?php

namespace App\Imports;

use App\Models\Culture;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CulutreImport implements ToCollection,
    WithHeadingRow,
    WithValidation

{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $item) {
            if ($item->filter()->isNotEmpty()) {
                Culture::create([
                    'title' => $item['nazvanie']
                ]);
            }
        }
    }

    public function rules(): array
    {
        return [
            'nazvanie' => 'required|string'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nazvanie.required' => 'Отсутствует поле наименование',
            'nazvanie.string' => 'Наименование должно быть строковым значением'
        ];

    }


}
