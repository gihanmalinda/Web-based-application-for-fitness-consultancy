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
      // Arial 10
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
	    $this->Cell(30,10,'Active consultant list',0,0,'C');
	    // Line break
	    $this->Ln(10);


	    //dummy cell to give line spacing
		//$this->Cell(0,5,'',0,1);
		//is equivalent to:
		$this->Ln(0);
		
		$this->SetFont('Arial','B',9);
		
		$this->SetFillColor(180,180,255);
		$this->SetDrawColor(180,180,255);

		$this->Cell(15);

		$this->Cell(20,5,'NIC',1,0,'',true);
		$this->Cell(35,5,'Name',1,0,'',true);
		$this->Cell(50,5,'Email',1,0,'',true);
		$this->Cell(35,5,'Address',1,0,'',true);
		$this->Cell(20,5,'Phone',1,1,'',true);

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



$pdf->SetFont('Arial','',8);
$pdf->SetDrawColor(180,180,255);




$query=mysqli_query($con,"SELECT nic,name,email,address,mobile_no FROM consultant WHERE deletion_indicator IS NULL ORDER BY name");
while($data=mysqli_fetch_array($query)){
	$pdf->Cell(15);

	$pdf->Cell(20,5,$data['nic'],'LR',0);
	$pdf->Cell(35,5,$data['name'],'LR',0);
	$pdf->Cell(50,5,$data['email'],'LR',0);
	$pdf->Cell(35,5,$data['address'],'LR',0);
	$pdf->Cell(20,5,$data['mobile_no'],'LR',1);




}



$pdf->SetFont('Arial','I',10);
$date =  date("F j, Y");
$pdf->Cell(40,30,'Report date: '.$date);















$pdf->Output('D','Active consultant list.pdf');

?>