<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Excel;

class UserExport implements FromView, Responsable
{
   use Exportable;
   private $headers = [
     'Content-Type' => 'text/csv'
   ];
   private $fileName = 'Users.xlsx';
   private $writerType = Excel::XLSX;

    public function view(): View
    {
        return view('exports.user.index', [
           'users' => User::all('name', 'email')
        ]);
    }
}
