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
		$this->Cell(265,3,'NIP. 19640505 198603 1 028',0,0,'C');
		}
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Lembar DISPOSISI '.date("d-m-Y"),0,0,'C');
	}

	function headerTable($asalsurat=null,$tgl_masuk=null,$nosurat=null,$tglsurat=null,$noagenda=null){
		$this->SetFont('Arial','B',12);
		$this->Cell(30,10,'Surat Dari',0,0,'L');
		$this->Cell(10,10,': ',0,0,'C');
		$this->Cell(90,10,$asalsurat,0,0,'L');
		$this->Cell(30,10,'Diterima tgl',0,0,'L');
		$this->Cell(10,10,': ',0,0,'C');
		$this->Cell(50,10,$tgl_masuk,0,0,'L');
		$this->Ln();
		$this->Cell(30,10,'No. Surat',0,0,'L');
		$this->Cell(10,10,': ',0,0,'C');
		$this->Cell(90,10,$nosurat,0,0,'L');
		$this->Cell(30,10,'No Agenda',0,0,'L');
		$this->Cell(10,10,': ',0,0,'C');
		$this->Cell(50,10,$noagenda,0,0,'L');
		$this->Ln();
		$this->Cell(30,10,'Tgl. Surat',0,0,'L');
		$this->Cell(10,10,': ',0,0,'C');
		$this->Cell(90,10,$tglsurat,0,0,'L');
		$this->Cell(30,10,'Sifat',0,0,'L');
		$this->Cell(10,10,': ',0,0,'C');
		$this->Cell(50,10,'',0,0,'C');
		$this->Ln();
	}

	function haL($perihal=null){
		$this->SetFont('Arial', 'B',12);
		$this->Cell(192,5,'Hal :',0,0,'L');
		$this->Ln();
		$this->SetFont('Arial', 'B',11);
		$this->Cell(192,20,'  '.$perihal,1,0,'L');
	}


	function sifatbox($a=null){
		if($a=="segera"){

			$this->SetFont('Arial','B',12);

			$this->Cell(90,10,'',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Image('box.png',103,103.8);
			$this->Cell(40,10,'Amat Segera',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Cell(40,10,'Segera',0,0,'L');
			$this->Image('box-checked.png',153,103.8);
			$this->Ln();
			$this->Cell(90,10,'',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Cell(40,10,'Penting',0,0,'L');
			$this->Image('box.png',103,113.8);
			$this->Cell(10,10,'',0,0,'L');
			$this->Image('box.png',153,113.8);
			$this->Cell(40,10,'Biasa',0,0,'L');

		}else if($a=="biasa"){

			$this->SetFont('Arial','B',12);

			$this->Cell(90,10,'',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Image('box.png',103,103.8);
			$this->Cell(40,10,'Amat Segera',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Cell(40,10,'Segera',0,0,'L');
			$this->Image('box.png',153,103.8);
			$this->Ln();
			$this->Cell(90,10,'',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Cell(40,10,'Penting',0,0,'L');
			$this->Image('box.png',103,113.8);
			$this->Cell(10,10,'',0,0,'L');
			$this->Image('box-checked.png',153,113.8);
			$this->Cell(40,10,'Biasa',0,0,'L');

		}else if($a=="amat segera"){

			$this->SetFont('Arial','B',12);

			$this->Cell(90,10,'',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Image('box-checked.png',103,103.8);
			$this->Cell(40,10,'Amat Segera',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Cell(40,10,'Segera',0,0,'L');
			$this->Image('box.png',153,103.8);
			$this->Ln();
			$this->Cell(90,10,'',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Cell(40,10,'Penting',0,0,'L');
			$this->Image('box.png',103,113.8);
			$this->Cell(10,10,'',0,0,'L');
			$this->Image('box.png',153,113.8);
			$this->Cell(40,10,'Biasa',0,0,'L');

		}else if($a=="penting"){

			$this->SetFont('Arial','B',12);

			$this->Cell(90,10,'',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Image('box.png',103,103.8);
			$this->Cell(40,10,'Amat Segera',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Cell(40,10,'Segera',0,0,'L');
			$this->Image('box.png',153,103.8);
			$this->Ln();
			$this->Cell(90,10,'',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Cell(40,10,'Penting',0,0,'L');
			$this->Image('box-checked.png',103,113.8);
			$this->Cell(10,10,'',0,0,'L');
			$this->Image('box.png',153,113.8);
			$this->Cell(40,10,'Biasa',0,0,'L');
		}else{

			$this->SetFont('Arial','B',12);

			$this->Cell(90,10,'',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Image('box.png',103,103.8);
			$this->Cell(40,10,'Amat Segera',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Cell(40,10,'Segera',0,0,'L');
			$this->Image('box.png',153,103.8);
			$this->Ln();
			$this->Cell(90,10,'',0,0,'L');
			$this->Cell(10,10,'',0,0,'L');
			$this->Cell(40,10,'Penting',0,0,'L');
			$this->Image('box.png',103,113.8);
			$this->Cell(10,10,'',0,0,'L');
			$this->Image('box.png',153,113.8);
			$this->Cell(40,10,'Biasa',0,0,'L');
		}
	}
	function terusKan(){
		$this->Image('box.png',50,172);
		$this->Image('box.png',50,180);
		$this->Image('box.png',50,188);
		$this->Image('box.png',50,196);
		$this->Image('box.png',50,204);
		$this->Image('box.png',50,212);
		$this->Image('box.png',123,172);
		$this->Image('box.png',123,180);
		$this->Image('box.png',123,188);
		$this->Image('box.png',123,196);
		$this->Image('box.png',123,204);
		$this->Image('box.png',123,212);

		$this->SetFont('Arial', 'B',12);
		$this->Cell(192,8,'',0,0,'L');
		$this->Ln();
		$this->Cell(120,8,'Diteruskan Kepada :',0,0,'L');
		$this->Cell(72,8,'Dengan hormat harap :',0,0,'L');
		$this->Ln();
		$this->Cell(33,8,'',0.0,'L');
		$this->Cell(15,8,'Sdr',0.0,'C');
		$this->Cell(62,8,'',0.0,'L');
		$this->Cell(10,8,'',0.0,'C');
		$this->Cell(72,8,'',0.0,'L');
		$this->Ln();
		$this->Cell(33,8,'',0.0,'L');
		$this->Cell(15,8,'',0.0,'C');
		$this->Cell(62,8,'Sekcam',0.0,'L');
		$this->Cell(10,8,'',0.0,'C');
		$this->Cell(72,8,'Tanggapan dan saran',0.0,'L');
		$this->Ln();
		$this->Cell(33,8,'',0.0,'L');
		$this->Cell(15,8,'',0.0,'C');
		$this->Cell(62,8,'Kasi Pemerintahan',0.0,'L');
		$this->Cell(10,8,'',0.0,'C');
		$this->Cell(72,8,'Proses dan lebih lanjut',0.0,'L');
		$this->Ln();
		$this->Cell(33,8,'',0.0,'L');
		$this->Cell(15,8,'',0.0,'C');
		$this->Cell(62,8,'Kasi Ekbag',0.0,'L');
		$this->Cell(10,8,'',0.0,'C');
		$this->Cell(72,8,'Koordinasi/Konfirmasi',0.0,'L');
		$this->Ln();
		$this->Cell(33,8,'',0,0,'L');
		$this->Cell(15,8,'',0,0,'C');
		$this->Cell(62,8,'Kasi Kesos',0,0,'L');
		$this->Cell(10,8,'',0,0,'C');
		$this->Cell(72,8,'.......................................',0,0,'L');
		$this->Ln();
		$this->Cell(33,8,'',0,0,'L');
		$this->Cell(15,8,'',0,0,'C');
		$this->Cell(62,8,'Kasi Trantib',0,0,'L');
		$this->Cell(10,8,'',0,0,'C');
		$this->Cell(72,8,'.......................................',0,0,'L');
		$this->Ln();
		$this->Cell(33,8,'',0,0,'L');
		$this->Cell(15,8,'',0,0,'C');
		$this->Cell(62,8,'Kasubag PAT',0,0,'L');
		$this->Cell(10,8,'',0.0,'C');
		$this->Cell(72,8,'.......................................',0.0,'L');
		$this->Ln();
		$this->Cell(192,8,'Catatan :',0,0,'L');
	}
	function viewTable($tabel){
		$this->Run = new Database();
		$this->Run->connect();
		
		
		$this->Ln();
		
		
	}

}
if(isset($_GET['id'])){
$id = $_GET['id'];
//($asalsurat=null,$tgl_masuk=null,$nosurat=null,$tglsurat=null,$noagenda=null)
$db = new Database();
$db->connect();
$db->sql('SELECT suratmasuk.*, disposisi.id_masuk FROM suratmasuk LEFT JOIN disposisi ON suratmasuk.id_masuk=disposisi.id_masuk WHERE suratmasuk.id_masuk='.$id);
$grabData = $db->getResult();
foreach ($grabData as $olah) {
	$asalsurat = $olah['asal_surat'];
	$tgl_masuk = $olah['tgl_masuk'];
	$nosurat = $olah['nomor_surat'];
	$tglsurat = $olah['tgl_surat'];
	$id_masuk = $olah['id_masuk'];
	$perihal = $olah['perihal'];
	$sifat = $olah['sifat'];

}
$pdf = new pdfKu();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->iniHeader();
$pdf->JudulDoc("LEMBAR DISPOSISI");
$pdf->headerTable($asalsurat,$tgl_masuk,$nosurat,$tglsurat,$id);
$pdf->Ln();
$pdf->sifatbox($sifat);
$pdf->Ln();
$pdf->haL($perihal);
$pdf->Ln();
$pdf->terusKan();
$pdf->Ln();
$pdf->TerbitDate('suratmasuk');
$pdf->Output();

}else{
	echo "Mau Nyetak Apa?";
}
?>
