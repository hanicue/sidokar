<?php
require "includes/fpdf.php";
require "sys/config.php";



class pdfKu extends FPDF
{
	
	function iniHeader(){
		$this->Image('logo.jpg',12,5);
		$this->SetFont('Times','B',14);
		$this->Cell(220,6,'PEMERINTAH KABUPATEN WONOSOBO',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','B',14);
		$this->Cell(220,6,'KECAMATAN MOJOTENGAH',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',14);
		$this->Cell(220,6,'Jl. Kalibeber No. 02 Telp. (0286) 3326139',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',14);
		$this->Cell(220,6,'MOJOTENGAH 56351',0,0,'C');
		$this->Ln();
		$this->Line(10, 38, 252-50, 38);
		$this->Line(10, 38.5, 252-50, 38.5);
		$this->Line(10, 38.6, 252-50, 38.6);
		$this->Line(10, 38.7, 252-50, 38.7);
		$this->Line(10, 38.8, 252-50, 38.8);
		$this->Line(10, 38.9, 252-50, 38.9);
		$this->Ln();
	}

	function JudulDoc($judul){
		$this->Ln();
		$this->SetFont('Arial','B',12);
		$this->Cell(200,15,$judul,0,0,'C');
		$this->Ln();
	}

	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Lembar Laporan Keluar '.date("d-m-Y"),0,0,'C');
	}

	function TerbitDate($table){
		$this->SetFont('Arial','B',12);
		$this->Walk= new Database();
		$this->Walk->connect();
		$this->Walk->sql("SELECT count(*) as total FROM $table");
			foreach($this->Walk->getResult() as $data){
		$this->Cell(265,$data["total"]+20,'Camat Mojotengah',0,0,'C');
		$this->Ln();
		$this->Cell(265,5,'Bandriyo,SP',0,0,'C');
		//$this->Line(10,$data["total"]+20,80-50,$data["total"]+20);
		$this->Ln();
		$this->Cell(265,5,'Pembina TK I',0,0,'C');
		$this->Ln();
		$this->Cell(265,3,'NIP. 19620211 198903 1 009',0,0,'C');
		}
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Lembar laporan '.date("d-m-Y"),0,0,'C');
	}

	function headerTable(){
		$this->SetFont('Times','B',12);
		$this->Cell(10,10,'No',1,0,'C');
		$this->Cell(40,10,'No Surat',1,0,'C');
		$this->Cell(30,10,'Tgl Keluar',1,0,'C');
		$this->Cell(50,10,'Kepada',1,0,'C');
		$this->Cell(60,10,'Perihal',1,0,'C');
		$this->Cell(60,10,'Pengolah',1,0,'C');
		$this->Ln();
	}
	
	function viewTable($tabel){
		$this->Run = new Database();
		$this->Run->connect();
		
		
		$this->Ln();
		
		
	}

}
if(isset($_GET['id'])){
$id = $_GET['id'];
$db = new Database();
$db->connect();

$pdf = new pdfKu();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->iniHeader();
$pdf->JudulDoc("Laporan");
$pdf->Ln();
$pdf->headerTable();
$pdf->TerbitDate('arsipkeluar');
$pdf->Output();

}else{
	echo "Mau Nyetak Apa?";
}
?>
