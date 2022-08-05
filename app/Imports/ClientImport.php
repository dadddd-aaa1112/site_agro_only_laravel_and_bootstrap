<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\NumberFormat;

class ClientImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        foreach ($collection as $item) {
            if ($item->filter()->isNotEmpty()) {
                $date = intval($item['data_dogovora']);

                Client::firstOrCreate([
                    'title' => $item['naimenovanie'],
                    'contract_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y/m/d'),
                    'cost_deliveries' => $item['stoimost_postavki'],
                    'region' => $item['region']
                ]);
            }
        }
    }
}
