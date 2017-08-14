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
    $this->StandM->deleteStand($field);
    header("Location: stands");
  }
}

 ?>
