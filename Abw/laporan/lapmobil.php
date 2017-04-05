<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("db_pembelianmobil") or die(mysql_error());
include "pdf/fpdf.php";
$tgl = date('d-M-Y');
$pdf = new FPDF();
$pdf->Open();
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','',12);
$pdf->text(10,30,'UNIVERSITAS PUTRA INDONESIA YPTK PADANG');
$pdf->text(10,36,'INFORMASI DATA MAHASISWA');
$yi = 50;
$ya = 44;
$pdf->setFont('Arial','',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(10,$ya);
$pdf->CELL(6,6,'No',1,0,'C',1);
$pdf->CELL(25,6,'Kode Mobil',1,0,'C',1);
$pdf->CELL(50,6,'Merk',1,0,'C',1);
$pdf->CELL(50,6,'Type',1,0,'C',1);
$pdf->setXY(10,$ya);
$sql = mysql_query("select *from tb_mobil order by merk");
$i = 1;
$no = 1;
$max = 31;
$row = 6;
while($data = mysql_fetch_array($sql)){
$pdf->setXY(10,$ya);
$pdf->setFont('arial','',9);
$pdf->setFillColor(255,255,255);
$pdf->cell(6,6,$no,1,0,'C',1);
$pdf->cell(25,6,$data['kode_mobil'],1,0,'L',1);
$pdf->cell(50,6,$data['merk'],1,0,'L',1);
$pdf->CELL(50,6,$data['type'],1,0,'C',1);
$ya = $ya+$row;
$no++;
$i++;
}
$pdf->text(100,$ya+6,"PADANG , ".$tgl);
$pdf->text(100,$ya+18,"PIMPINAN");
$pdf->output();
?>