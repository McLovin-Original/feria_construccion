<?php

Class MainController{

  public function mainPage(){
    require_once("views/modules/access_mod/login.php");
    require_once("views/include/footer.php");
  }
  public function dashboard(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/bienvenida.php");
    require_once("views/include/footer.php");
  }
  public function expositor(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/expositores.php");
    require_once("views/include/footer.php");
  }
  public function conferencias(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/conferencias.php");
    require_once("views/include/footer.php");
  }
  public function pabellones(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/pabellones.php");
    require_once("views/include/footer.php");
  }
  public function stands(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/stands.php");
    require_once("views/include/footer.php");
  }
  public function reportes(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/reportes.php");
    require_once("views/include/footer.php");
  }
  public function gestSeguridad(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/seguridad.php");
    require_once("views/include/footer.php");
  }
}

 ?>
