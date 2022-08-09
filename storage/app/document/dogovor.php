<?php
$phpWord = new PhpWord();

$section = $phpWord->addSection();

$section->addText('Справка', [
    'size' => 18, 'color' => '#000', 'bold' => true
]);
$section->addText('');

$section->addText('Подтверждает действительность заключение договора от ' .  $date .  ' с компанией ' . $name .
    ' на сумму ' . $price, [
    'size' => 13, 'color' => '#545454', 'italic' => true
]);
