<?php

require_once("model/stand.model.php");
Class StandController{
  private $StandM;

  public function __CONSTRUCT(){
    $this->StandM = new StandModel();
  }
  public function mainPage(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47") {
      require_once("views/modules/stand_mod/stand.php");
    }else{
      require_once("views/modules/stand_mod/stand.memories.php");
    }
    require_once("views/include/footer.php");
  }
  public function gesMemories(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/stand_mod/stand.memories.php");
    require_once("views/include/footer.php");
  }
  public function selectQr(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/stand_mod/stand_QR/stand.select.php");
    require_once("views/include/footer.php");
  }
  public function qr(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/stand_mod/stand_QR/stand.qr.php");
    require_once("views/include/footer.php");
  }
  public function create(){
    $data = $_POST["data"];
    if (empty($data[2])) {
      $data[3]="No tiene";
    }
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
      $dir = "views/assets/qr/$data[7]/";
      if (!file_exists($dir)) {
        mkdir($dir);
      }
      $this->StandM->createStand($data);
      $return = array(true,"Guardo Con Exito","stands");
    }
    echo json_encode($return);
  }
  public function updateData(){
    $field = $_GET["token"];
    require_once("views/include/header.php");
    //require_once("views/include/dashboard.php");
    require_once("views/modules/stand_mod/stand.update.php");
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
      $this->StandM->updateStand($data);
      $return = array(true,"Actualizo Con Exito","stands");
    }
    echo json_encode($return);
  }
  public function delete(){
    $field = $_GET["token"];
    $dir = "views/assets/qr/$field/";
    $stand=$this->StandM->readStandById($field);
    $name=$stand["sta_name"];
    unlink("$dir/$name");
    rmdir($dir);
    $this->StandM->deleteStand($field);
    $msn="Eliminado Con Exito";
    header("Location: stands&msn=$msn");
  }
  public function invalid(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/stand_mod/stand.invalid.php");
    require_once("views/include/footer.php");
  }
  public function crearMemories(){
    $data = $_POST["data"];
    $user=$_SESSION["user"]["id"];
    $flag=false;
    $tmp = $_FILES["stand"]["tmp_name"];
    $ruta = "views/assets/expositor/".$user."/";
    $Ext  = pathinfo($_FILES["stand"]["name"],PATHINFO_EXTENSION);
    if ($Ext!="rar" && $Ext!="zip") {
      $msn = "Sube un Archivo Winrar O ZipRar";
    }else{
      if(!is_dir($ruta)){
        mkdir($ruta,0777);
      }
      if ($tmp!="") {
        $flag=true;
        $evento = $ruta.$_FILES["stand"]["name"];
      }else{
        $flag=false;
      }
      if ($flag==true) {
        if (move_uploaded_file($tmp,$evento)) {
          $code=$_SESSION["user"]["id"];
          $stand=$this->StandM->readStandByUser($code);
          $data[2]=$stand['sta_code'];
          $data[3]=$_FILES["stand"]["name"];
          $data[4]=randomAlpha('6');
          $this->StandM->createMemories($data);
          $msn = "Subio Correctamente";
        }else{
          $msn = "Error Al Subir";
        }
      }else{
        $msn ="Error Al Subir";
      }
    }
    header("Location: expo-memorias&msn=$msn");
  }
  public function deleteMemories(){
    $field = $_GET["token"];
    $result = $this->StandM->readStandMemoriesById($field);
    $name=$result["fis_file"];
    $user=$_SESSION["user"]["id"];
    unlink("views/assets/expositor/$user/$name");
    rmdir("views/assets/expositor/$user");
    $this->StandM->deleteMemories($field);
    $msn="Elimino Correctamente";
    header("Location: expo-memorias&msn=$msn");
  }
}

 ?>
