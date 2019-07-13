<?php
//call main fpdf file
require('fpdf.php');

//create new class extending fpdf class
class PDF_ASM_Table extends FPDF {

// variable to store widths and aligns of cells, and line height
var $widths;
var $aligns;
var $lineHeight;

//Set the array of column widths
function SetWidths($w){
    $this->widths=$w;
}

//Set the array of column alignments
function SetAligns($a){
    $this->aligns=$a;
}

//Set line height
function SetLineHeight($h){
    $this->lineHeight=$h;
}

//Calculate the height of the row
function Row($data)
{
    // number of line
    $nb=0;

    // loop each data to find out greatest line number in a row.
    for($i=0;$i<count($data);$i++){
        // NbLines will calculate how many lines needed to display text wrapped in specified width.
        // then max function will compare the result with current $nb. Returning the greatest one. And reassign the $nb.
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    }
    
    //multiply number of line with line height. This will be the height of current row
    $h=$this->lineHeight * $nb;

    //Issue a page break first if needed
    $this->CheckPageBreak($h);

    //Draw the cells of current row
    for($i=0;$i<count($data);$i++)
    {
        // width of the current col
        $w=$this->widths[$i];
        // alignment of the current col. if unset, make it left.
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}
    function JudulDoc($judul){
        $this->Ln();
        $this->SetFont('Times','B',12);
        $this->Cell(276,15,$judul,0,0,'C');
        $this->Ln();
    }

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}
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
    function headerArsipMasuk(){
        $this->SetFont('Times','B',12);
        $this->Cell(10,10,'No',1,0,'C');
        $this->Cell(30,10,'No Surat',1,0,'C');
        $this->Cell(30,10,'Tgl Masuk',1,0,'C');
        $this->Cell(40,10,'Asal Surat',1,0,'C');
        $this->Cell(20,10,'Perihal',1,0,'C');
        $this->Cell(60,10,'Turun ke-',1,0,'C');
        $this->Ln();
    }

    
    function footerNya(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
    }

function NbLines($w,$txt)
{
    //calculate the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
}
?>