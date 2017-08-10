<?php

Class EventModel{
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
  public function createDay($data){
      try {
        $sql = "INSERT INTO day VALUES(?,?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[5],$data[0],$data[1],$data[2],$data[4],$data[4]));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }
   public function readEvent(){
       try {
         $sql="SELECT * FROM event INNER JOIN user ON(user.use_code=event.use_code) ORDER BY eve_name";
         $query = $this->pdo->prepare($sql);
         $query->execute();
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readEventByCode($field){
       try {
          $sql="SELECT * FROM event WHERE eve_code = ?";
          $query = $this->pdo->prepare($sql);
          $query->execute(array($field));
          $result = $query->fetch(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function deleteEvent($field){
       try {
           $sql = "DELETE FROM event WHERE eve_code = ?";
           $query = $this->pdo->prepare($sql);
           $query->execute(array($field));
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
   }
   public function __DESTRUCT(){
       DataBase::disconnect();
   }
}

 ?>
