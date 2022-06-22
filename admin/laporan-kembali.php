<?php
include "../conn.php";
require('../fpdf17/fpdf.php');

//Menampilkan data dari tabel di database

$result=mysql_query("SELECT * FROM trans_pinjam WHERE status='kembali' ORDER BY id") or die(mysql_error());

//Inisiasi untuk membuat header kolom
//$column_id = "";
$column_judul = "";
$column_nama = "";
$column_pinjam = "";
$column_kembali = "";
$column_status = "";
$column_ket = "";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
	//$id = $row["id"];
    $judul = $row["judul_buku"];
    $nama = $row["nama_peminjam"];
    $pinjam = $row["tgl_pinjam"];
    $kembali = $row["tgl_kembali"];
	$status = $row["status"];
    $ket = $row["ket"];
 
    

	//$column_id = $column_id.$id."\n";
    $column_judul = $column_judul.$judul."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_pinjam = $column_pinjam.$pinjam."\n";
    $column_kembali = $column_kembali.$kembali."\n";
    $column_status = $column_status.$status."\n";
    $column_ket = $column_ket.$ket."\n";
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(220,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
$pdf->Image('../img/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA PEMINJAMAN BUKU',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'PerPusWeb (Perpustakaan Berbasis Web)',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(50,8,'Judul',1,0,'C',1);
$pdf->SetX(55);
$pdf->Cell(45,8,'Peminjam',1,0,'C',1);
$pdf->SetX(100);
$pdf->Cell(25,8,'Tgl Pinjam',1,0,'C',1);
$pdf->SetX(125);
$pdf->Cell(25,8,'Tgl Kembali',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(25,8,'Status',1,0,'C',1);
$pdf->SetX(175);
$pdf->Cell(40,8,'Keterangan',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(50,6,$column_judul,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(55);
$pdf->MultiCell(45,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(100);
$pdf->MultiCell(25,6,$column_pinjam,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(25,6,$column_kembali,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(150);
$pdf->MultiCell(25,6,$column_status,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(175);
$pdf->MultiCell(40,6,$column_ket,1,'C');

$pdf->Output();
?>
