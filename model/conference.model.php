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
         $sql="SELECT * FROM conference INNER JOIN day ON(conference.day_code=day.day_code)";
         $query = $this->pdo->prepare($sql);
         $query->execute();
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readConferenceById($field){
       try {
         $sql="SELECT * FROM conference INNER JOIN day ON(conference.day_code=day.day_code) WHERE conference.con_code = ?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($field));
         $result = $query->fetch(PDO::FETCH_BOTH);
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
   public function readDiaByEventUpdate($data){
       try {
         $sql="SELECT * FROM day INNER JOIN event ON(day.eve_code=event.eve_code) WHERE event.eve_code = ? AND day_code != ?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($data[0],$data[1]));
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function updateConference($data){
       try {
           $sql = "UPDATE conference SET day_code = ?,con_name = ?,con_exhibitor = ?,con_startime = ?,con_finishtime = ?,con_share = ?,con_description = ? WHERE con_code = ?";
           $query = $this->pdo->prepare($sql);
           $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7]));
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
   }
   public function deleteConference($field){
       try {
           $sql = "DELETE FROM conference WHERE con_code = ?";
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
