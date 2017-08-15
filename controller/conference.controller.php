<?php

require_once("model/conference.model.php");
Class ConferenceController{
  private $ConferenceM;

  public function __CONSTRUCT(){
    $this->ConferenceM = new ConferenceModel();
  }

  public function mainPage(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47") {
      require_once("views/modules/conference_mod/conference.php");
    }else{
      require_once("views/modules/conference_mod/conference.memories.php");
    }
    require_once("views/include/footer.php");
  }
  public function gesMemories(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/conference_mod/conference.memories.php");
    require_once("views/include/footer.php");
  }
  public function create(){
    $data = $_POST["data"];
    for ($i=0; $i <count($data) ; $i++) {
      if (empty($data[$i])) {
        $p=1;
        break;
      }else{
        $p=0;
      }
    }
    if ($p==1) {
      $return = array(false,"Campos Nulos","");
    }else{
      $data[7]=randomAlpha('6');
      $data[8]=date('Ymd');
      $data[9]=date('his');
      $data[10]="Activo";
      $this->ConferenceM->createConference($data);
      $return = array(true,"Guardo Con Exito","conferencias");
    }
    echo json_encode($return);
  }
  public function event(){
    $data[0] = $_POST["data"];
    $result = $this->ConferenceM->readDiaByEvent($data);
    foreach ($result as $row) {
      echo "<option value='".$row["day_code"]."'>".$row["day_current"]."</option>";
    }
  }
  public function updateData(){
    $field = $_GET["token"];
    require_once("views/include/header.php");
    //require_once("views/include/dashboard.php");
    require_once("views/modules/conference_mod/conference.update.php");
    require_once("views/include/footer.php");
  }
  public function update(){
    $data = $_POST["data"];
    for ($i=0; $i <count($data) ; $i++) {
      if (empty($data[$i])) {
        $p=1;
        break;
      }else{
        $p=0;
      }
    }
    if ($p==1) {
      $return = array(false,"Campos Nulos","");
    }else{
      $this->ConferenceM->updateConference($data);
      $return = array(true,"Actualizo Con Exito","conferencias");
    }
    echo json_encode($return);
  }
  public function delete(){
    $field = $_GET["token"];
    $this->ConferenceM->deleteConference($field);
    header("Location: conferencias");
  }
  public function invalid(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/conference_mod/conference.invalid.php");
    require_once("views/include/footer.php");
  }
  public function crearMemories(){
    $data = $_POST["data"];
    $user=$_SESSION["user"]["id"];
    $flag=false;
    $tmp = $_FILES["conf"]["tmp_name"];
    $ruta = "views/assets/conference/".$user."/";
    $Ext  = pathinfo($_FILES["conf"]["name"],PATHINFO_EXTENSION);
    if ($Ext!="rar" && $Ext!="zip") {
      $msn = "Sube un Archivo Winrar O ZipRar";
    }else{
      if(!is_dir($ruta)){
        mkdir($ruta,0777);
      }
      if ($tmp!="") {
        $flag=true;
        $evento = $ruta.$_FILES["conf"]["name"];
      }else{
        $flag=false;
      }
      if ($flag==true) {
        if (move_uploaded_file($tmp,$evento)) {
          $code=$_SESSION["user"]["id"];
          $conf=$this->ConferenceM->readConferenceByUser($code);
          $data[2]=$conf['con_code'];
          $data[3]=$_FILES["conf"]["name"];
          $data[4]=randomAlpha('6');
          $this->ConferenceM->createMemories($data);
          $msn = "Subio Correctamente";
        }else{
          $msn = "Error Al Subir";
        }
      }else{
        $msn ="Error Al Subir";
      }
    }
    header("Location: con-memorias&msn=$msn");
  }
  public function deleteMemories(){
    $field = $_GET["token"];
    $result = $this->ConferenceM->readConferenceMemoriesById($field);
    $name=$result["fic_file"];
    $user=$_SESSION["user"]["id"];
    unlink("views/assets/conference/$user/$name");
    rmdir("views/assets/conference/$user");
    $this->ConferenceM->deleteMemories($field);
    $msn="Elimino Correctamente";
    header("Location: expo-memorias&msn=$msn");
  }
}

 ?>
