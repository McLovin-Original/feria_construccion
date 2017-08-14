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
    require_once("views/modules/conference_mod/conference.php");
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
}

 ?>
