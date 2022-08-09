<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class DogovorController extends Controller
{
    public function __invoke($id) {

        $client = Client::findOrFail($id);
        $date = Carbon::now()->format('d.m Y');
        $filePath = storage_path('app/document/' . 'dogovor.docx');
        $template = new TemplateProcessor($filePath);
        $template->setValue('date', $date);
        $template->setValue('title', $client->title);
        $template->setValue('date_order', $client->contract_date);
        $template->setValue('price', $client->cost_deliveries);
        $fileName = 'Contract';
        $template->saveAs($fileName . '.docx');
        return response()
            ->download($fileName . '.docx')
            ->deleteFileAfterSend(true);
    }
}
