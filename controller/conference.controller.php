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
      require_once("views/modules/conference_mod/conference.select.php");
    }
    require_once("views/include/footer.php");
  }
  public function gesMemories(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/conference_mod/conference.memories.php");
    require_once("views/include/footer.php");
  }
  public function selectQr(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/conference_mod/conference_QR/conference.select.php");
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
      $dir = "views/assets/qr_conf/$data[7]/";
      if (!file_exists($dir)) {
        mkdir($dir);
      }
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
    $dir = "views/assets/qr_conf/$field/";
    $conf=$this->ConferenceM->readConferenceById($field);
    $name=$conf["con_name"];
    unlink("$dir$name".".png");
    rmdir($dir);
    rmdir("views/assets/conference/$field");
    $this->ConferenceM->deleteConference($field);
    header("Location: conferencias");
  }
  public function select(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/conference_mod/conference.select.php");
    require_once("views/include/footer.php");
  }
  public function invalid(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/conference_mod/conference.invalid.php");
    require_once("views/include/footer.php");
  }
  public function crearMemories(){
    $data = $_POST["data"];
    $data[2]=$_POST['con_code'];
    $flag=false;
    $tmp = $_FILES["conf"]["tmp_name"];
    $ruta = "views/assets/conference/".$data[2]."/";
    $Ext  = pathinfo($_FILES["conf"]["name"],PATHINFO_EXTENSION);
    if ($Ext!="rar" && $Ext!="zip") {
      $msn = "Sube un Archivo Winrar O ZipRar";
    }else{
      if(!is_dir($ruta)){
        mkdir($ruta,0777);
      }
      if ($tmp!="") {
        $flag=true;
        $name=date('hs')."-".$_FILES["conf"]["name"];
        $evento = $ruta.$name;
      }else{
        $flag=false;
      }
      if ($flag==true) {
        if (move_uploaded_file($tmp,$evento)) {
          $data[3]=$name;
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
    header("Location: con-memorias&msn=$msn&token=$data[2]");
  }
  public function deleteMemories(){
    $field = $_GET["token"];
    $result = $this->ConferenceM->readConferenceMemoriesById($field);
    $name=$result["fic_file"];
    $con=$result["con_code"];
    unlink("views/assets/conference/$con/$name");
    $this->ConferenceM->deleteMemories($field);
    $msn="Elimino Correctamente";
    header("Location: con-memorias&msn=$msn&token=$con");
  }
}

 ?>
