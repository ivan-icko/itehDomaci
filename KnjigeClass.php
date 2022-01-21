<?php

class Knjiga{
  public $IdKnjige;
  public $NazivKnjige;
  public $Autor;
  public $Zanr;

  function __construct($IdKnjige,$NazivKnjige,$Autor,$Zanr) {
        $this->IdKnjige = $IdKnjige;
        $this->NazivKnjige = $NazivKnjige;
        $this->Autor = $Autor;
        $this->Zanr = $Zanr;
    }

    public function save($conn){
        if($conn->query("INSERT INTO knjiga(NazivKnjige,Autor,Zanr) VALUES ('$this->NazivKnjige','$this->Autor',$this->Zanr)")){
          return true;
        }else{
          return false;
        }
    }

    public function updateBook($conn){
        if($conn->query("UPDATE Knjiga SET NazivKnjige='$this->NazivKnjige',Autor='$this->Autor',Zanr=$this->Zanr where IdKnjige=$this->IdKnjige")){
          return true;
        }else{
          return false;
        }
    }
    public function getById($conn,$id){
      if($conn->query("SELECT * FROM Knjiga where IdKnjige=$id")){
        return true;
      }else{
        return false;
      }
    }
    public function delete($conn,$id){
        if($conn->query("DELETE FROM knjiga where idKnjige=$id")){
          return true;
        }else{
          return false;
        }
    }
}
