<?php

require_once("model/pavilion.model.php");
Class PavilionController{
  private $PavilionM;

  public function __CONSTRUCT(){
    $this->PavilionM = new PavilionModel();
  }

  public function mainPage(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/pavilion_mod/pavilion.php");
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
      $data[2]=randomAlpha('30');
      $this->PavilionM->createPavilion($data);
      $return = array(true,"Guardo Con Exito","pabellon");
    }
    echo json_encode($return);
  }
  public function event(){
    $data[0] = $_POST["data"];
    $result = $this->PavilionM->readDiaByEvent($data);
    foreach ($result as $row) {
      echo "<option value='".$row["day_code"]."'>".$row["day_current"]."</option>";
    }
  }
  public function updateData(){
    $field = $_GET["token"];
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/pavilion_mod/pavilion.update.php");
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
      $this->PavilionM->updatePavilion($data);
      $return = array(true,"Actualizo Con Exito","pabellon");
    }
    echo json_encode($return);
  }
  public function delete(){
    $field = $_GET["token"];
    $this->PavilionM->deletePavilion($field);
    header("Location: pabellon");
  }
}

 ?>
