<?php
require_once __DIR__ . '/../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = "<h1>Hola Mundo desde mPDF</h1><p>Master en PHP</p>";
$mpdf->WriteHTML($html);

$mpdf->Output('pdf_generado.pdf', 'I'); // I = mostrar en navegador

?> 