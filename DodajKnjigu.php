<?php
 include 'konekcija.php';
 include 'KnjigeClass.php';
//require "index.php";

 if(isset($_POST['naziv']) && isset($_POST['autor']) && isset($_POST['zanr']) && isset($_POST['datum'] )){
  $knjiga = new Knjiga(null,$_POST['naziv'],$_POST['autor'],($_POST['zanr']));
  $rez=$knjiga->save($conn);
  
  if($rez){
    echo 'Ok';
 }else{ 
   echo 'No';
   echo $status;
 }
 } 
  ?>