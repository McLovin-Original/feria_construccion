<?php

Class MainController{

  public function mainPage(){
    if (!isset($_SESSION["user"])) {
      require_once("views/modules/access_mod/login.php");
      require_once("views/include/footer.php");
    }else{
      if ($_SESSION["user"]["rol"]!="OS7CX80C7QQBLGJV41MB3YY4ZA234O") {
        header("Location: stand-user");
      }else{
        header("Location: dashboard");
      }
    }
  }
  public function dashboard(){
    if (!isset($_SESSION["user"])) {
      header("Location: inicio");
    }else{
      if ($_SESSION["user"]["rol"]!="OS7CX80C7QQBLGJV41MB3YY4ZA234O") {
        require_once("views/include/header.php");
        require_once("views/include/dashboard.php");
        require_once("views/modules/bienvenida.php");
        require_once("views/include/footer.php");
      }else{
        header("location: stand-user");
      }
    }
  }
}

 ?>
