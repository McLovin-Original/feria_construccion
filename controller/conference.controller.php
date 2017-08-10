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
}

 ?>
