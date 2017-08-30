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
  public function createDay($rand,$event){
      try {
        $sql = "INSERT INTO day VALUES(?,?,?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($rand,$event,NULL,NULL,NULL,NULL,NULL));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }
  public function updateDay($data){
      try {
        $sql = "UPDATE day SET day_current = ?,day_date = ?,day_startime = ?,day_finishtime = ?,day_descrip = ? WHERE day_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[2],$data[3],$data[4],$data[5],$data[6],$data[0]));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }
   public function readDay($field){
       try {
         $sql="SELECT * FROM event INNER JOIN day ON(day.eve_code=event.eve_code) WHERE event.eve_code = ?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($field));
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
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
   public function readEventQr($field){
       try {
         $sql="SELECT * FROM event INNER JOIN day ON(event.eve_code=day.eve_code) WHERE event.eve_code = ? LIMIT 1";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($field));
         $result = $query->fetch(PDO::FETCH_BOTH);
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
           $sql = "DELETE FROM day WHERE eve_code = ?";
           $query = $this->pdo->prepare($sql);
           $query->execute(array($field));
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
