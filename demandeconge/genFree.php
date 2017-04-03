<?php
include "fpdf.php";

$data = $_POST;
$newfile = utf8_decode($data['name']).'-'.date('d-m-y').'.pdf';
$location = "F:\426\demandeconge";
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('modelImage.jpg',0,0,-200);
$pdf->SetFont('Arial','',12);
$pdf->SetX(60);
$pdf->Write(82,utf8_decode($data['name'])."   ".utf8_decode($data["firstname"])."                                                            ".$data["class"]);
$pdf->SetX(60);
$pdf->Write(107,utf8_decode($data['start']));
$pdf->SetX(60);
$pdf->Write(120,utf8_decode($data['return']));
$pdf->SetXY(60,100);
$pdf->MultiCell(100,5,$data["cause"]);
$pdf->Output();
?>