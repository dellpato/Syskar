<?php
require("/fpdf/fpdf.php");
$datos = "Hola esto es una prueba";
$hora= $_POST['horario'];
class PDF extends FPDF
{
	function Header()
	{
			$this->Image('../logo_muni.png',10,10,25);
			$this->SetFont('Arial','B',15);
			$this->Cell(80);
			$this->Cell(30,10,utf8_decode('Municipalidad de Chiquimula'),0,0,'C');
			$this->Ln(20);
			$this->SetFont('Arial','B',10);
			$this->Cell(0,10,utf8_decode('Chiquimula,Chiquimula,Guatemala'),0,0,'L');
			$this->Ln(4);
			$this->Cell(0,10,utf8_decode('Contrato'),0,0,'C');
			$this->Ln();
	}
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		
		$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'',0,0,'C');
	}
}

$pdf = new PDF();

$data = $datos;
$data2=  $hora;
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->Text(10,50,$data);
$pdf->Text(10,60,$hora);
$pdf->Output();

?>