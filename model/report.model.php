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
  public function readCalification(){
      try {
        $sql = "SELECT * FROM calification INNER JOIN user ON(calification.use_code=user.use_code)";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_BOTH);
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
  public function countUserAprendiz(){
      try {
        $sql = "SELECT COUNT(*) FROM user WHERE use_profession = 'Aprendiz'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
   }
  public function countUserInstructor(){
      try {
        $sql = "SELECT COUNT(*) FROM user WHERE use_profession = 'Instructor'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
   }
  public function countUserAdministrativo(){
      try {
        $sql = "SELECT COUNT(*) FROM user WHERE use_profession = 'Administrativo'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
   }
  public function countUserEmpresario(){
      try {
        $sql = "SELECT COUNT(*) FROM user WHERE use_profession = 'Empresario'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
   }
  public function countUserOtro(){
      try {
        $sql = "SELECT COUNT(*) FROM user WHERE use_profession = 'Otro'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
   }
   public function countConferencista(){
     try {
       $sql="SELECT COUNT(*) FROM  user INNER JOIN access ON(user.use_code=access.use_code) WHERE rol_code = 'ASEV4G5GVCG5A7O38DKS8W2EDDE42A'";
       $query=$this->pdo->prepare($sql);
       $query->execute();
       $result=$query->fetch(PDO::FETCH_BOTH);
     } catch (PDOException $e) {
       die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
     }
     return $result;
   }
   public function countUseStand(){
     try {
       $sql="SELECT COUNT(*) FROM use_stand";
       $query=$this->pdo->prepare($sql);
       $query->execute();
       $result=$query->fetch(PDO::FETCH_BOTH);
     } catch (PDOException $e) {
       die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
     }
     return $result;
   }
   public function countUseConference(){
     try {
       $sql="SELECT COUNT(*) FROM use_conference";
       $query=$this->pdo->prepare($sql);
       $query->execute();
       $result=$query->fetch(PDO::FETCH_BOTH);
     } catch (PDOException $e) {
       die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
     }
     return $result;
   }
   public function promEntrada(){
     try {
       $sql="SELECT from_unixtime( sum( unix_timestamp( ing_time ) ) / count( ing_time ) ) AS promedio FROM ing_eve";
       $query=$this->pdo->prepare($sql);
       $query->execute();
       $result=$query->fetch(PDO::FETCH_BOTH);
     } catch (PDOException $e) {
       die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
     }
     return $result;
   }
   public function promSalida(){
     try {
       $sql="SELECT from_unixtime( sum( unix_timestamp( sal_time ) ) / count( sal_time ) ) AS promedio FROM sal_eve";
       $query=$this->pdo->prepare($sql);
       $query->execute();
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
