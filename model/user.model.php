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
      $result=0;
    } catch (PDOException $e) {
      $result=$e->getCode();
    }
    return $result;
  }
  public function createIngreso($data){
      try {
        $sql = "INSERT INTO ing_eve VALUES(?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[2],$data[1],$data[0],$data[3],$data[4]));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }
  public function createSalida($data){
      try {
        $sql = "INSERT INTO sal_eve VALUES(?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[2],$data[1],$data[0],$data[3],$data[4]));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }
  public function readEvent(){
    try {
      $sql="SELECT * FROM event INNER JOIN day ON(event.eve_code=day.eve_code) WHERE day_current='DIA1'";
      $query=$this->pdo->prepare($sql);
      $query->execute();
      $result=$query->fetchALL(PDO::FETCH_BOTH);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
    return $result;
  }
  public function readIngresoRepetido($data){
      try {
        $sql="SELECT * FROM ing_eve WHERE day_code = ? AND use_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[1],$data[0]));
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readSalidaRepetido($data){
      try {
        $sql="SELECT * FROM sal_eve WHERE day_code = ? AND use_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[1],$data[0]));
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readUserIngreso($field){
      try {
        $sql="SELECT * FROM ing_eve INNER JOIN user ON(ing_eve.use_code=user.use_code) WHERE day_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($field));
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readUserSalida($field){
      try {
        $sql="SELECT * FROM sal_eve INNER JOIN user ON(sal_eve.use_code=user.use_code) WHERE day_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($field));
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readUser(){
    try {
      $sql="SELECT * FROM role INNER JOIN user ON(role.rol_code=user.rol_code) INNER JOIN access ON(user.use_code=access.use_code)";
      $query=$this->pdo->prepare($sql);
      $query->execute();
      $result=$query->fetchALL(PDO::FETCH_BOTH);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
    return $result;
  }
  public function readUserbyDocument($data){
    try {
      $sql="SELECT * FROM user INNER JOIN access ON(user.use_code=access.use_code) WHERE user.use_docu = ?";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[0]));
      $result=$query->fetch(PDO::FETCH_BOTH);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
    return $result;
  }
  public function readUserbyId($field){
    try {
      $sql="SELECT * FROM user INNER JOIN access ON(user.use_code=access.use_code) WHERE user.use_code = ?";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($field));
      $result=$query->fetch(PDO::FETCH_BOTH);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
    return $result;
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
  public function updateStatus($data){
    try {
      $sql="UPDATE access SET acc_status = ? WHERE acc_token = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[1],$data[0]));
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
  }
  public function updateUser($data){
    try {
      $sql="UPDATE user SET use_firstname = ?, use_lastname = ?,use_cellphone = ?,use_gender = ?,use_institution = ?,use_profession = ? WHERE use_code = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[8]));
      $sql="UPDATE access SET use_mail = ?,password = ? WHERE use_code = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[0],$data[7],$data[8]));
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
  }
  public function updateUserByDoc($data){
    try {
      $sql="UPDATE access SET password = ? WHERE use_code = ? ";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[0],$data[1]));
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
  }
  public function deleteUser($field){
      try {
        $sql = "DELETE FROM ing_eve WHERE use_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($field));
        $sql = "DELETE FROM sal_eve WHERE use_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($field));
        $sql = "DELETE FROM user WHERE use_code = ?";
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
