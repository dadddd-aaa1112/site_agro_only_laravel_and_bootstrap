<?php

namespace App\Exports;

use App\Models\Fertilizer;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Excel;

class FertilizerExport implements FromView, Responsable
{
    use Exportable;
    private $fileName = 'Fertilizers.xlsx';
    private $headers = [
      'Content-Type' => 'text/csv'
    ];
    private $writerType = Excel::XLSX;


    public function view(): View
    {
        return view('exports.fertilizer.index', [
           'fertilizers' => Fertilizer::all()
        ]);
    }
}
