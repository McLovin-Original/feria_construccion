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
}

 ?>
