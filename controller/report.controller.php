<?php

require_once("model/report.model.php");
Class ReportController{
  private $ReportM;

  public function __CONSTRUCT(){
    $this->ReportM = new ReportModel();
  }
  public function mainPage(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/reportes.php");
    require_once("views/include/footer.php");
  }
}

 ?>
