<?php

Class StandModel{
  private $pdo;

  public function __CONSTRUCT(){
    try {
      $this->pdo = DataBase::connect();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
  }
  public function createStand($data){
      try {
        $sql = "INSERT INTO stand VALUES(?,?,?,?,?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[6],$data[1],$data[0],$data[2],$data[3],$data[4],$data[5],$data[7],$data[8]));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }
  public function readStand(){
      try {
        $sql="SELECT * FROM stand INNER JOIN pavilion ON(pavilion.pav_code=stand.pav_code)";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readPavilion(){
      try {
        $sql="SELECT * FROM pavilion";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
   public function __DESTRUCT(){
       DataBase::disconnect();
   }
}

 ?>
