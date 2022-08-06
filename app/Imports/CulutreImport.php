<?php

namespace App\Imports;

use App\Models\Culture;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CulutreImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        foreach($collection as $item) {
            if($item->filter()->isNotEmpty()) {
                Culture::create([
                    'title' => $item['nazvanie']
                ]);
            }
        }
    }
}
