<?php

Class UserModel{
  private $pdo;

  public function __CONSTRUCT(){
    try {
      $this->pdo = DataBase::connect();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
  }
  public function createUser($data){
    try {
      $sp="CALL crearUsuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $query=$this->pdo->prepare($sp);
      $query->execute(array($data[11],$data[2],$data[3],$data[0],$data[1],$data[7],$data[5],$data[6],$data[8],$data[9],$data[12],$data[4],$data[10],$data[13]));
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
  }
  public function readRol(){
    try {
      $sql="SELECT * FROM role";
      $query=$this->pdo->prepare($sql);
      $query->execute();
      $result=$query->fetchALL(PDO::FETCH_BOTH);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
    return $result;
  }
  public function readUserByEmail($data){
    try {
      $sp="CALL readEmail(?)";
      $query=$this->pdo->prepare($sp);
      $query->execute(array($data[0]));
      $result=$query->fetch(PDO::FETCH_BOTH);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
    return $result;
  }
  public function __DESTRUCT(){
      DataBase::disconnect();
  }
}

 ?>
