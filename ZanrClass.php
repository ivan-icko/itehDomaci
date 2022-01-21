<?php
class Zanr{
  public $ZanrId;
  public $NazivZanra;

  function __construct($ZanrId,$NazivZanra) {
        $this->ZanrId = $ZanrId;
        $this->NazivZanra = $NazivZanra;
    }
   
   
   
    public function getIdByName($conn){
      $query="SELECT  ZanrId from zanrknjige where NazivZanra='Bojanka'";
      return   $conn->query($query);
      
  }
    

    public function save($conn){
        if($conn->query("INSERT INTO zanrknjige(NazivZanra) VALUES ('$this->nazivZanra')")){
          return true;
        }else{
          return false;
        }
    }
}
