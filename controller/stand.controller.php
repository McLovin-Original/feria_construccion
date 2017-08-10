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
    require_once("views/modules/stand_mod/stand.php");
    require_once("views/include/footer.php");
  }
}

 ?>
