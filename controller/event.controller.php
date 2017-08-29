<?php

require_once("model/event.model.php");
Class EventController{
  private $EventM;

  public function __CONSTRUCT(){
    $this->EventM = new EventModel();
  }

  public function mainPage(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/event_mod/eventos.php");
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
      $data[3]=randomAlpha('30');
      $fechaI=explode("-",$data[1]);
      $fechaF=explode("-",$data[2]);
      $data[4]=$fechaF[2]-$fechaI[2]+1;
      $data[5]=date('Ymd');
      $data[6]=date('hms');
      $data[7]=$_SESSION["user"]["id"];
      $this->EventM->createEvent($data);
      $event=$data[3];
      for ($i=0; $i <$data[4] ; $i++) {
          $rand=randomAlpha('30');
          $this->EventM->createDay($rand,$event);
      }
      $return = array(true,"Guardo Con Exito","eventos");
    }
    echo json_encode($return);
  }
  public function dias(){
    $field = $_GET["token"];
    $event = $this->EventM->readEventByCode($field);
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/event_mod/dias.php");
    require_once("views/include/footer.php");
  }
  public function event_qr(){
    $field = $_GET["token"];
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/event_mod/event_qr.php");
    require_once("views/include/footer.php");
  }

  public function updateDias(){
    $data = $_POST["data"];
    $this->EventM->updateDay($data);
    header("Location: dias&token=$data[1]");
  }

  public function delete(){
    $field = $_GET["token"];
    $this->EventM->deleteEvent($field);
    header("Location: eventos");
  }

}

 ?>
