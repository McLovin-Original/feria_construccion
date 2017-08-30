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
        $sql = "INSERT INTO stand VALUES(?,?,?,?,?,?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[7],$data[1],$data[2],$data[0],$data[3],$data[4],$data[5],$data[6],$data[8],$data[9]));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }
  public function createVisitStand($data){
      try {
        $sql = "INSERT INTO use_stand VALUES(?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[2],$data[0],$data[1]));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }
   public function createMemories($data){
       try {
         $sql = "INSERT INTO file_stand VALUES(?,?,?,?,?)";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($data[4],$data[2],$data[0],$data[3],$data[1]));
       } catch (PDOException $e) {
         die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
    }
  public function readStand(){
      try {
        $sql="SELECT * FROM stand INNER JOIN pavilion ON(pavilion.pav_code=stand.pav_code) INNER JOIN user ON(user.use_code=stand.use_code)";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readStandVisit($field){
      try {
        $sql="SELECT * FROM stand INNER JOIN use_stand ON(stand.sta_code=use_stand.sta_code) INNER JOIN user ON(stand.use_code=user.use_code) WHERE use_stand.use_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($field));
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readStandUser(){
      try {
        $sql="SELECT * FROM user INNER JOIN access ON(user.use_code=access.use_code) WHERE rol_code = 'E3HDKX3684UTA7DMHFOAA34HAK39PM' AND acc_status = 'Activo'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readUserStand($data){
      try {
        $sql="SELECT * FROM stand INNER JOIN user ON(stand.use_code=user.use_code) WHERE user.use_code != ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[0]));
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readStandById($field){
      try {
        $sql="SELECT * FROM stand INNER JOIN pavilion ON(pavilion.pav_code=stand.pav_code) INNER JOIN user ON(user.use_code=stand.use_code) WHERE sta_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($field));
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readStandByPav($data){
      try {
        $sql="SELECT * FROM stand INNER JOIN pavilion ON(pavilion.pav_code=stand.pav_code) WHERE pavilion.pav_code != ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[0]));
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
  public function readStandByUser($code){
      try {
        $sql="SELECT * FROM stand WHERE use_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($code));
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readStandMemoriesAdmin(){
      try {
        $sql="SELECT * FROM stand INNER JOIN file_stand ON(stand.sta_code=file_stand.sta_code)";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readStandMemories($code){
      try {
        $sql="SELECT * FROM stand INNER JOIN file_stand ON(stand.sta_code=file_stand.sta_code) WHERE use_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($code));
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readStandMemoriesUser($campo){
      try {
        $sql="SELECT * FROM stand INNER JOIN file_stand ON(stand.sta_code=file_stand.sta_code) WHERE stand.sta_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($campo));
        $result = $query->fetchALL(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function readStandMemoriesById($field){
      try {
        $sql="SELECT * FROM file_stand WHERE fis_code = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($field));
        $result = $query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
      return $result;
  }
  public function updateStand($data){
      try {
          $sql = "UPDATE stand SET pav_code = ?, sta_name = ?,use_code = ?,sta_web = ?,sta_mail = ?,sta_numcontact = ?,sta_descrip = ?  WHERE sta_code = ? ";
          $query = $this->pdo->prepare($sql);
          $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7]));
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
  }
  public function deleteStand($field){
      try {
          $sql = "DELETE FROM use_stand WHERE sta_code = ?";
          $query = $this->pdo->prepare($sql);
          $query->execute(array($field));
          $sql = "DELETE FROM stand WHERE sta_code = ?";
          $query = $this->pdo->prepare($sql);
          $query->execute(array($field));
      } catch (PDOException $e) {
          die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
  }
  public function deleteMemories($field){
      try {
          $sql = "DELETE FROM file_stand WHERE fis_code = ?";
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
