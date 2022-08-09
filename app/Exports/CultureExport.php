<?php

namespace App\Exports;

use App\Models\Culture;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Excel;

class CultureExport implements FromView, Responsable
{
    use Exportable;

    private $fileName = 'Cultures.xlsx';
    private $headers = [
        'Content-Type' => 'text/csv'
    ];
    private $writerType = Excel::XLSX;

    public function view(): View
    {
        return view('exports.culture.index', [
            'cultures' => Culture::all('title')
        ]);
    }
}
