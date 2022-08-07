<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\NumberFormat;

class ClientImport implements ToCollection,
    WithHeadingRow,
    WithValidation,
//    SkipsOnFailure,
    SkipsEmptyRows
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {


            foreach ($collection as $item) {
                if ($item->filter()->isNotEmpty()) {
                    $date = intval($item['data_dogovora']);

                    Client::create([
                        'title' => $item['naimenovanie'],
                        'contract_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y/m/d'),
                        'cost_deliveries' => $item['stoimost_postavki'],
                        'region' => $item['region']
                    ]);
                }
            }
    }

    public function rules(): array
    {
        return [
            'naimenovanie' => 'required|string',
            'data_dogovora' => 'required',
            'stoimost_postavki' => 'required|numeric',
            'region' => 'required|string'
        ];
    }

    public function customValidationMessages()
    {

        return [
            'naimenovanie.required' => 'Отсутствует поле наименование',
            'data_dogovora.required' => 'Отсутствует поле дата договора',
            'stoimost_postavki.required' => 'Отсутствует поле стомость поставки',
            'region.required' => 'Добавьте дату в импортируемый файл'
        ];
    }


//    public function onFailure(Failure ...$failures)
//    {
//
//        foreach ($failures as $failure) {
//            ($failure->row());
//        }
//    }
}
