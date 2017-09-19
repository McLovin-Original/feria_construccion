<?php

require_once("model/event.model.php");
Class EventController{
  private $EventM;

  public function __CONSTRUCT(){
    if ($_SESSION["user"]["rol"]!="F34L2P7GPT9RHI37S306OFVI16TI47") {
      header("Location: inicio");
    }
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
      $dir = "views/assets/event_qr/$event/";
      if (!file_exists($dir)) {
        mkdir($dir);
      }
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
    $msn="Dia Actualizado Correctamente";
    header("Location: dias&token=$data[1]&msn=$msn");
  }

  public function delete(){
    $field = $_GET["token"];
    $result = $this->EventM->readEventByCode($field);
    $name=$result["eve_name"].".png";
    $msn=$this->EventM->deleteEvent($field);
    if ($msn==23000) {
      $msn="Error al eliminar";
      $url="eventos&msn=$msn";
    }else{
      $url="eventos";
      unlink("views/assets/event_qr/$field/$name");
      rmdir("views/assets/event_qr/$field");
    }
    header("Location: $url");
  }

}

 ?>
