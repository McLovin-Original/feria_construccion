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
        $sql = "INSERT INTO conference VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[7],$data[2],$data[0],$data[1],$data[3],$data[4],$data[5],$data[8],$data[9],$data[6],$data[10],$data[5]));
      } catch (PDOException $e) {
        die($e->getMessage()."".$e->getLine()."".$e->getFile());
      }
   }
   public function createVisitConference($data){
       try {
         $sql = "INSERT INTO use_conference VALUES(?,?,?)";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($data[2],$data[0],$data[1]));
       } catch (PDOException $e) {
         die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
    }
   public function createMemories($data){
       try {
         $sql = "INSERT INTO file_conference VALUES(?,?,?,?,?)";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($data[4],$data[2],$data[0],$data[3],$data[1]));
       } catch (PDOException $e) {
         die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
    }
    public function readUserbyDocument($documento){
      try {
        $sql="SELECT * FROM user WHERE use_docu = ?";
        $query=$this->pdo->prepare($sql);
        $query->execute(array($documento));
        $result=$query->fetch(PDO::FETCH_BOTH);
      } catch (PDOException $e) {
        die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
      }
      return $result;
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
         $sql="SELECT * FROM conference INNER JOIN day ON(conference.day_code=day.day_code) INNER JOIN user ON(conference.use_code=user.use_code)";
         $query = $this->pdo->prepare($sql);
         $query->execute();
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readConferenceVisit($field){
       try {
         $sql="SELECT * FROM conference INNER JOIN day ON(conference.day_code=day.day_code) INNER JOIN use_conference ON(conference.con_code=use_conference.con_code) INNER JOIN user ON(conference.use_code=user.use_code) WHERE use_conference.use_code = ?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($field));
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readUseConference($field){
       try {
         $sql="SELECT * FROM conference INNER JOIN use_conference ON(conference.con_code=use_conference.con_code) INNER JOIN user ON(conference.use_code=user.use_code) WHERE use_conference.con_code = ?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($field));
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readUseConferenceByConUser($data){
       try {
         $sql="SELECT * FROM use_conference WHERE con_code = ? AND use_code = ?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($data[1],$data[0]));
         $result = $query->fetch(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readUserConference($data){
       try {
         $sql="SELECT * FROM conference INNER JOIN user ON(conference.use_code=user.use_code) WHERE user.use_code != ?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($data[0]));
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readConferenceByUser($code){
       try {
         $sql="SELECT * FROM conference WHERE use_code = ?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($code));
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readConferenceById($field){
       try {
         $sql="SELECT * FROM conference INNER JOIN day ON(conference.day_code=day.day_code) INNER JOIN user ON(conference.use_code=user.use_code) WHERE conference.con_code = ?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($field));
         $result = $query->fetch(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readConferenceUser(){
       try {
         $sql="SELECT * FROM user INNER JOIN access ON(user.use_code=access.use_code) WHERE rol_code = 'ASEV4G5GVCG5A7O38DKS8W2EDDE42A' AND acc_status = 'Activo'";
         $query = $this->pdo->prepare($sql);
         $query->execute(array());
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readConferenceMemories($id){
       try {
         $sql="SELECT * FROM conference INNER JOIN file_conference ON(conference.con_code=file_conference.con_code) WHERE conference.con_code = ?";
         $query = $this->pdo->prepare($sql);
         $query->execute(array($id));
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function readConferenceMemoriesById($field){
       try {
         $sql="SELECT * FROM file_conference WHERE fic_code = ?";
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
           $sql = "UPDATE conference SET day_code = ?,use_code = ?,con_name = ?,con_startime = ?,con_finishtime = ?,con_share = ?,con_description = ? WHERE con_code = ?";
           $query = $this->pdo->prepare($sql);
           $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7]));
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
   }
   public function updateCountConference($id){
       try {
           $sql = "UPDATE conference SET con_count = (con_count-1) WHERE con_code = ?";
           $query = $this->pdo->prepare($sql);
           $query->execute(array($id));
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
   }
   public function updateConferenceStatus($field){
       try {
           $sql = "UPDATE conference SET con_status = 'Inactivo' WHERE con_code = ?";
           $query = $this->pdo->prepare($sql);
           $query->execute(array($field));
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
   }
   public function deleteConference($field){
       try {
           $sql = "DELETE FROM use_conference WHERE con_code = ?";
           $query = $this->pdo->prepare($sql);
           $query->execute(array($field));
           $sql = "DELETE FROM conference WHERE con_code = ?";
           $query = $this->pdo->prepare($sql);
           $query->execute(array($field));
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
   }
   public function deleteMemories($field){
       try {
           $sql = "DELETE FROM file_conference WHERE fic_code = ?";
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
