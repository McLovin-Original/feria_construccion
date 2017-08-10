<?php

Class ConferenceModel{
  private $pdo;

  public function __CONSTRUCT(){
    try {
      $this->pdo = DataBase::connect();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
  }
  public function createConference($data){
      try {
        $sql = "INSERT INTO conference VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[7],$data[2],$data[0],$data[1],$data[3],$data[4],$data[5],$data[8],$data[9],$data[6],$data[10]));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }

   public function readEvent(){
       try {
         $sql="SELECT * FROM event";
         $query = $this->pdo->prepare($sql);
         $query->execute();
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readConference(){
       try {
         $sql="SELECT * FROM conference";
         $query = $this->pdo->prepare($sql);
         $query->execute();
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readDiaByEvent($data){
       try {
         $sql="SELECT * FROM day INNER JOIN event ON(day.eve_code=event.eve_code) WHERE event.eve_code=?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($data[0]));
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
