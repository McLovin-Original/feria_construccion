<?php

require_once ("model/user.model.php");

Class UserController{
  private $UserM;

  public function __CONSTRUCT(){
    $this->UserM = new UserModel();
  }
  public function mainPage(){
    require_once("views/modules/user_mod/registro.php");
    require_once("views/include/footer.php");
  }
  public function validEmail(){
      $data[0] = $_POST["data"];
      $result = $this->UserM->readUserbyEmail($data);
      if(count($result[0])>=1){
        $return = (true);
      }else{
        $return = (false);
      }
      echo json_encode($return);
  }
  public function signIn(){
      $data = $_POST["data"];
      $result = $this->UserM->readUserbyEmail($data);
      if (password_verify($data[1],$result["password"])) {
        if ($result["rol_code"]!="OS7CX80C7QQBLGJV41MB3YY4ZA234O") {
          if ($result["acc_status"]!="Inactivo") {
            $_SESSION["user"]["id"]=$result["use_code"];
            $_SESSION["user"]["rol"]=$result["rol_code"];
            $_SESSION["user"]["name"]=$result["use_firstname"];
            $_SESSION["user"]["cargo"]=$result["use_profession"];
            $_SESSION["user"]["token"]=$result["acc_token"];
            $_SESSION["user"]["email"]=$result["use_mail"];
            $return = array(true,"dashboard");
          }else{
            $return = array(false,"Su estado es inactivo");
          }
        }else{
          $return = array(false,"No tienes permiso para ingresar");
        }
      }else{
        $return = array(false,"Contraseña Incorrecta");
      }
      echo json_encode($return);
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
    if ($data[10]!==$data[11]) {
      $return = array(false,"Contraseñas Incorrectas","");
    }else{
      if ($p==1) {
        $return = array(false,"Campos Nulos","");
      }else{
        if ($data[2]!="OS7CX80C7QQBLGJV41MB3YY4ZA234O") {
          $msn="Se Validara Su Rol En El Momento El Usuario Estara Inactivo";
          $estado="Inactivo";
        }else{
          $msn="Guardo Con Exito";
          $estado="Activo";
        }
        $data[10]=password_hash($data[10],PASSWORD_DEFAULT);
        $data[11]=randomAlpha('30');
        $data[12]=randomAlpha('30');
        $data[13]=$estado;
        $this->UserM->createUser($data);
        $return = array(true,$msn,"inicio");
        }
      }
    echo json_encode($return);
  }
  public function close(){
    session_destroy();
    header("Location: inicio");
  }

}

 ?>
