<?php
require('code128.php');

$pdf=new PDF_Code128('L','in',array(4,2.3125));
$pdf->AddPage();
$pdf->SetFont('Arial','',10);



//A set
$code=$_GET['id'];
$man=$_GET['man'];
$model=$_GET['model'];
$modelnum=$_GET['modelnum'];
$serial=$_GET['serial'];
$service=$_GET['service'];
$condition=$_GET['condition'];

$pdf->cell(0,-.35,'Item Number: '.$code.'',0,1,'C');
$pdf->Code128(.45,1.7,$code,1.5,.5,"C");
$pdf->SetXY(.39,.4);
$pdf->SetFont('','B');
$pdf->Write(.12,"Condition: $condition");
$pdf->Ln();
$pdf->SetFont('','I');
$pdf->Write(.12,"Manufacturer: $man \nModel: $model \nModel Number: $modelnum \nSerial Number: $serial \nService Number: $service");



$pdf->Output();
?>
