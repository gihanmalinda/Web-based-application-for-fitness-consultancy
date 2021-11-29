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
      $this->Cell(30,10,'Client age groups',0,0,'C');
      // Line break
      $this->Ln(10);


      //dummy cell to give line spacing
    //$this->Cell(0,5,'',0,1);
    //is equivalent to:
    $this->Ln(0);
    
    $this->SetFont('Arial','B',11);
    
    $this->SetFillColor(180,180,255);
    $this->SetDrawColor(180,180,255);
    $this->Cell(70);

    $this->Cell(25,5,'Age group',1,0,'',true);
    $this->Cell(30,5,'No of clients',1,1,'',true);
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


$pdf->SetFont('Arial','',12);
$pdf->SetDrawColor(180,180,255);












$count_below_20 = 0;
$count_21_30 = 0;
$count_31_40 = 0;
$count_41_50 = 0;
$count_51_60 = 0;
$count_above_60 = 0;


$query=mysqli_query($con,"SELECT CAST( DATEDIFF( CURDATE(), DOB )/365 AS signed ) AS DateDiff FROM CLIENT");

while($row=mysqli_fetch_array($query)) {

  $data = $row["DateDiff"];

  if($data <= 20){
    $count_below_20++;
  }

  elseif($data >= 21 && $data <= 30){ 
    $count_21_30++;
  }

  elseif($data >= 31 && $data <= 40){
    $count_31_40++;
  }

  elseif($data >= 41 && $data <= 50){
    $count_41_50++;
  }

  elseif($data >= 51 && $data <= 60){
    $count_51_60++;
  }

  elseif( 60 < $data){
    $count_above_60++;
  }


}

  $pdf->Cell(70);
  $pdf->Cell(25,5,'below 20','LR',0);
  $pdf->Cell(30,5,$count_below_20,'LR',1);

  $pdf->Cell(70);
  $pdf->Cell(25,5,'21-30','LR',0);
  $pdf->Cell(30,5,$count_21_30,'LR',1);

  $pdf->Cell(70);
  $pdf->Cell(25,5,'31-40','LR',0);
  $pdf->Cell(30,5,$count_31_40,'LR',1);

  $pdf->Cell(70);
  $pdf->Cell(25,5,'41-50','LR',0);
  $pdf->Cell(30,5,$count_41_50,'LR',1);

  $pdf->Cell(70);
  $pdf->Cell(25,5,'51-60','LR',0);
  $pdf->Cell(30,5,$count_51_60,'LR',1); 

  $pdf->Cell(70);
  $pdf->Cell(25,5,'above 60','LR',0);
  $pdf->Cell(30,5,$count_above_60,'LR',1);





$pdf->SetFont('Arial','I',10);
$date =  date("F j, Y");
$pdf->Cell(40,30,'Report date: '.$date);













$pdf->Output('D','Client age groups.pdf');

?>








