<?php

namespace App\Exports;

use App\Models\Client;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Excel;

class ClientExport implements FromView, Responsable
{
    use Exportable;

    private $fileName = 'Clients.xlsx';
    private $headers = [
        'Content-Type' => 'text/csv'
    ];
    private $writerType = Excel::XLSX;

    public function view(): View
    {
        return view('exports.client.index', [
            'clients' => Client::all('title', 'contract_date', 'cost_deliveries', 'region')
        ]);
    }
}
