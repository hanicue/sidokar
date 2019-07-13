<?php
require "includes/fpdf-asm.php";
require "sys/config.php";
date_default_timezone_set("Asia/Jakarta");

$pdf = new PDF_ASM_Table();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->IniHeader();
$pdf->Ln();


$judul="Laporan Arsip Masuk";
        $pdf->Ln();
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(190,15,$judul,0,0,'C');
        $pdf->Ln();


$pdf->headerArsipmasuk();
$pdf->SetFont('Times','',12);

$pdf->SetWidths(Array(10,30,30,40,20,60));
$pdf->SetAligns(Array('C','C','C','C','C','C'));
$pdf->SetLineHeight(5);

		$Run = new Database();
		$Run->connect();
		$Run->sql('SELECT arsipmasuk.*,disposisi.*,suratmasuk.* FROM arsipmasuk LEFT JOIN disposisi ON arsipmasuk.id_disposisi=disposisi.id_disposisi LEFT JOIN suratmasuk ON disposisi.id_masuk=suratmasuk.id_masuk');
		$pdf->SetFont('Times','',10);
		$i=0;    
		
		foreach($Run->getResult() AS $data){

			$bag = $data['id_bagian'];
			$Run->sql("SELECT * FROM bagian WHERE id_bagian=".$bag);
			foreach($Run->getResult() AS $waw){
				$ian = $waw['bagian'];
			}
			$tgl_masuk = $data["tgl_masuk"];
			$tgl_a = date("d-m-Y", strtotime($tgl_masuk));
			$i++;
			$pdf->Row(Array(
				$i,
				$data['nomor_surat'],
				$tgl_a,
				$data['asal_surat'],
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
