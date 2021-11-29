<?php

require('fpdf184/fpdf.php');

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'health_club_fitness');



class PDF extends FPDF{
	function Header(){
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	   	$this->Cell(80);
	    // Title
	    $this->Cell(30,10,'Health club fitness',0,0,'C');
	    // Line break
	    $this->Ln(5);
	    // Move to the right
	    // Arial bold 15
	    $this->SetFont('Arial','',10);

	    $this->Cell(80);
	    // Title
	    $this->Cell(30,10,'No 7C, Radawana Road, Yakkala, Gampaha, Sri Lanka. (+94772419108)',0,0,'C');
	    // Line break
	    $this->Ln(10);

	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(30,10,'Uploaded article list',0,0,'C');
	    // Line break
	    $this->Ln(10);


	    //dummy cell to give line spacing
		//$this->Cell(0,5,'',0,1);
		//is equivalent to:
		$this->Ln(0);
		
		$this->SetFont('Arial','B',11);
		
		$this->SetFillColor(180,180,255);
		$this->SetDrawColor(180,180,255);

		$this->Cell(40);

		$this->Cell(10,5,'ID',1,0,'',true);
		$this->Cell(40,5,'Name',1,0,'',true);
		$this->Cell(30,5,'Type',1,0,'',true);
		$this->Cell(40,5,'Upload date/time',1,1,'',true);
	}

	// Page footer
	function Footer()
	{
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}


}



/* Instanciation of inherited class */
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);


$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(180,180,255);




$query=mysqli_query($con,"SELECT id, name, post_type, date_upload FROM `article`");
while($data=mysqli_fetch_array($query)){
	$pdf->Cell(40);

	$pdf->Cell(10,5,$data['id'],'LR',0);
	$pdf->Cell(40,5,$data['name'],'LR',0);
	$pdf->Cell(30,5,$data['post_type'],'LR',0);
	$pdf->Cell(40,5,$data['date_upload'],'LR',1);
}






$pdf->SetFont('Arial','I',10);
$date =  date("F j, Y");
$pdf->Cell(40,30,'Report date: '.$date);
















$pdf->Output('D','Uploaded article list.pdf');

?>