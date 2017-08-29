<?php

Class ReportModel{
  private $pdo;

  public function __CONSTRUCT(){
    try {
      $this->pdo = DataBase::connect();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
  }
  public function createEvent($data){
      try {
        $sql = "INSERT INTO event VALUES(?,?,?,?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[3],$data[0],$data[1],$data[2],$data[4],$data[5],$data[6],$data[7]));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }
   public function __DESTRUCT(){
       DataBase::disconnect();
   }
}

 ?>
