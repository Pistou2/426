<?php
include "fpdf.php";

$data = $_POST;
// Le message
$message = "Line 1\r\nLine 2\r\nLine 3";

// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
$message = wordwrap($message, 70, "\r\n");

$headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

// Envoi du mail
try
{
mail('fasanoan@etml.educanet2.ch', "Salut maude c'estun text", $message.$headers);
}
catch(Exception $e)
{
	echo "envoie de mail echoué";
}
$count = 0;
settype($login,"string");
 $i = 0;
        while ($i < mb_strlen($data['name'], "UTF-8")):
				if($i < 8)
				{
					$login .= $data['name'][$i];					
				}
				$i++;
        endwhile;
 $i = 0;
        while ($i < 2):
				$login .= $data['firstname'][$i];
            $i++;
        endwhile;
		$login = strtolower($login);
$newfile = utf8_decode($login).'-'.date('d-m-y').'.pdf';
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
$pdf->Output("F",$newfile);
?>