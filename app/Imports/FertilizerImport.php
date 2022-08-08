<?php

namespace App\Imports;

use App\Models\Fertilizer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FertilizerImport implements
    ToCollection,
    WithHeadingRow,
    WithValidation,
    SkipsEmptyRows

{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $item) {
            if ($item->filter()->isNotEmpty()) {
                Fertilizer::firstOrCreate([
                    'title' => $item['naimenovanie'],
                    'norm_azot' => $item['norma_azot'],
                    'norm_fosfor' => $item['norma_fosfor'],
                    'norm_kalii' => $item['norma_kalii'],
                    'culture_id' => $item['kultura_id'],
                    'raion' => $item['raion'],
                    'cost' => $item['stoimost'],
                    'description' => $item['opisanie'],
                    'target' => $item['naznacenie'],
                ]);
            }
        }


    }

    public function rules(): array
    {
        return [
            'naimenovanie' => 'required|string',
            'norma_azot' => 'required|numeric',
            'norma_fosfor' => 'required|numeric',
            'norma_kalii' => 'required|numeric',
            'kultura_id' => 'required|exists:cultures,id',
            'raion' => 'required|string',
            'stoimost' => 'required|numeric',
            'opisanie' => 'required|string',
            'naznacenie' => 'required|string'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'naimenovanie.required' => 'Заполните необходимое поле :attribute',
            'norma_azot.required' => 'Заполните необходимое поле :attribute',
            'norma_fosfor.required' => 'Заполните необходимое поле :attribute',
            'norma_kalii.required' => 'Заполните необходимое поле :attribute',
            'kultura_id.required' => 'Заполните необходимое поле :attribute',
            'raion.required' => 'Заполните необходимое поле :attribute',
            'stoimost.required' => 'Заполните необходимое поле :attribute',
            'opisanie.required' => 'Заполните необходимое поле :attribute',
            'naznacenie.required' => 'Заполните необходимое поле :attribute'
        ];
    }
}
