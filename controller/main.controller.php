<?php

Class MainController{

  public function mainPage(){
    if (!isset($_SESSION["user"])) {
      require_once("views/modules/access_mod/login.php");
      require_once("views/include/footer.php");
    }else{
      header("Location: dashboard");
    }
  }
  public function dashboard(){
    if (!isset($_SESSION["user"])) {
      header("Location: inicio");
    }else{
      require_once("views/include/header.php");
      require_once("views/include/dashboard.php");
      require_once("views/modules/bienvenida.php");
      require_once("views/include/footer.php");
    }
  }
}

 ?>
