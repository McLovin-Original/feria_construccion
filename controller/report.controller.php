<?php

require_once("model/report.model.php");
Class ReportController{
  private $ReportM;

  public function __CONSTRUCT(){
    $this->ReportM = new ReportModel();
  }
  public function chart(){
    $stand = $this->ReportM->countStand();
    $conferencia = $this->ReportM->countConference();
    $aprendiz = $this->ReportM->countUserAprendiz();
    $instructor = $this->ReportM->countUserInstructor();
    $administrativo= $this->ReportM->countUserAdministrativo();
    $empresario = $this->ReportM->countUserEmpresario();
    $otro = $this->ReportM->countUserOtro();
    $total = $aprendiz[0]+$instructor[0]+$administrativo[0]+$empresario[0]+$otro[0];
    $data = array($stand[0],
                  $conferencia[0],
                  $aprendiz[0],
                  $instructor[0],
                  $administrativo[0],
                  $empresario[0],
                  $otro[0],
                  $total
                  );
    echo json_encode($data);
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
