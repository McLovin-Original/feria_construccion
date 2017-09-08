<?php

require_once("model/report.model.php");
Class ReportController{
  private $ReportM;

  public function __CONSTRUCT(){
    $this->ReportM = new ReportModel();
  }
  public function mainPage(){
    $stand = $this->ReportM->countStand();
    $confe = $this->ReportM->countConference();
    $user = $this->ReportM->countUser();
    $tConferencistas = $this->ReportM->countConferencista();
    $useStand = $this->ReportM->countUseStand();
    $useConfe = $this->ReportM->countUseConference();
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/mod_reportes/reportes.php");
    require_once("views/include/footer.php");
  }
}

 ?>
