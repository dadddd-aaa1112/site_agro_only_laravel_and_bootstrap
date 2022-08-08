<?php

function checkExtends($filePath)
{

    list($part1, $extendsFile) = explode('.', $filePath);
    $extendsFile = strtoupper($extendsFile);

    if ($extendsFile == 'XLSX') {
        $readerType = \Maatwebsite\Excel\Excel::XLSX;
    } else if ($extendsFile == 'XLS') {
        $readerType = \Maatwebsite\Excel\Excel::XLS;
    } else if ($extendsFile == 'CSV') {
        $readerType = \Maatwebsite\Excel\Excel::CSV;
    } else if ($extendsFile == 'XML') {
        $readerType = \Maatwebsite\Excel\Excel::XML;
    } else if ($extendsFile == 'TSV') {
        $readerType = \Maatwebsite\Excel\Excel::TSV;
    } else {
        $readerType = \Maatwebsite\Excel\Excel::XLSX;
    }
    return $readerType;

}
