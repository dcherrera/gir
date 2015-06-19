<?php
require('code128.php');

$pdf=new PDF_Code128('L','in',array(4,2.3125));
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

//A set
$code=$_GET['id'];

$pdf->cell(0,-.35,'Item Number:'.$code.'');
$pdf->Code128(.1,.3,$code,1.5,.5,"C");

$pdf->Output();
?>
