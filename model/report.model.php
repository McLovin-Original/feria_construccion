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
  public function countStand(){
      try {
        $sql = "SELECT COUNT(*) FROM stand";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
   }
  public function countConference(){
      try {
        $sql = "SELECT COUNT(*) FROM conference";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
   }
  public function countUser(){
      try {
        $sql = "SELECT COUNT(*) FROM user WHERE rol_code = 'OS7CX80C7QQBLGJV41MB3YY4ZA234O'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_BOTH);
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
