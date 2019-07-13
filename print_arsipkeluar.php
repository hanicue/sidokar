<?php
require "includes/fpdf-ask.php";
require "sys/config.php";
date_default_timezone_set("Asia/Jakarta");

$pdf = new PDF_ASK_Table();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->IniHeader();
$pdf->Ln();


$judul="Laporan Arsip Keluar";
        $pdf->Ln();
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(190,15,$judul,0,0,'C');
        $pdf->Ln();


$pdf->headerArsipkeluar();
$pdf->SetFont('Times','',12);

$pdf->SetWidths(Array(10,30,30,40,60,20));
$pdf->SetAligns(Array('C','C','C','C','C','C'));
$pdf->SetLineHeight(5);

		$Run = new Database();
		$Run->connect();
		$Run->sql('SELECT arsipkeluar.*,suratkeluar.* FROM arsipkeluar LEFT JOIN suratkeluar ON arsipkeluar.id_keluar=suratkeluar.id_keluar');
		$pdf->SetFont('Times','',10);
		$i=0;    
		
		foreach($Run->getResult() AS $data){

			$tgl_keluar = $data["tgl_keluar"];
			$bag = $data['id_bagian'];
			$Run->sql("SELECT * FROM bagian WHERE id_bagian=".$bag);
			foreach($Run->getResult() AS $waw){
				$ian = $waw['bagian'];
			}
			$tgl_a = date("d-m-Y", strtotime($tgl_keluar));
			$i++;
			$pdf->Row(Array(
				$i,
				$data['nomor_surat'],
				$tgl_a,
				$data['kepada'],
				$data['perihal'],
				$ian,
			));
		}

		$pdf->SetFont('Times','',12);
		$Walk= new Database();
		$Walk->connect();
		$Walk->sql("SELECT count(*) as total FROM arsipkeluar");
			foreach($Walk->getResult() as $data){
		$pdf->Cell(265,$data["total"]+20,'Camat Mojotengah',0,0,'C');
		$pdf->Ln();
		$pdf->Cell(265,5,'Bandriyo,SP',0,0,'C');
		$pdf->Ln();
		$pdf->Cell(265,5,'Pembina TK I',0,0,'C');
		$pdf->Ln();
		$pdf->Cell(265,3,'NIP. 19620211 198903 1 009',0,0,'C');
	
	}
$pdf->Output();
?>
