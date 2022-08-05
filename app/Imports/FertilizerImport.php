<?php

namespace App\Imports;

use App\Models\Fertilizer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FertilizerImport implements ToCollection, WithHeadingRow
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
}
