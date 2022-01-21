<?php
 include 'konekcija.php';
 include 'KnjigeClass.php';
 include 'ZanrClass.php';


 if(isset($_POST['idKnjige']) && isset($_POST['idZanra']) && isset($_POST['naziv']) && isset($_POST['autor']) && isset($_POST['zanr'])){
  $knjigaId=$_POST['idKnjige'];
  $naziv=$_POST['naziv'];
  $autor=$_POST['autor'];
  $zanr=$_POST['idZanra'];

  $knjiga=new Knjiga($knjigaId,$naziv,$autor,$zanr);
  $rezultat=$knjiga->updateBook($conn);
  
  if($rezultat){
    echo 'Ok';
 }else{ 
   echo 'No';
   echo $status;
 }
 } 
  ?>