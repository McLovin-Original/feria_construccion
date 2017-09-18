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
  public function gestUser(){
    if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47" || $_SESSION["user"]["rol"]==="rCa779aEMiMe3Okm1UIZfiezSeK6tk") {
      require_once("views/include/header.php");
      require_once("views/include/dashboard.php");
      require_once("views/modules/user_mod/user.manage.php");
      require_once("views/include/footer.php");
    }else{
      header("Location: inicio");
    }
  }
  public function selectEvent(){
    if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47" || $_SESSION["user"]["rol"]==="rCa779aEMiMe3Okm1UIZfiezSeK6tk") {
      require_once("views/include/header.php");
      require_once("views/include/dashboard.php");
      require_once("views/modules/user_mod/user.evento.php");
      require_once("views/include/footer.php");
    }else{
      header("Location: inicio");
    }
  }
  public function ingresos(){
    if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47" || $_SESSION["user"]["rol"]==="rCa779aEMiMe3Okm1UIZfiezSeK6tk") {
      $field=$_GET["token"];
      require_once("views/include/header.php");
      require_once("views/include/dashboard.php");
      require_once("views/modules/user_mod/user.ingreso.php");
      require_once("views/include/footer.php");
    }else{
      header("Location: inicio");
    }
  }
  public function salida(){
    if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47" || $_SESSION["user"]["rol"]==="rCa779aEMiMe3Okm1UIZfiezSeK6tk") {
      $field=$_GET["token"];
      require_once("views/include/header.php");
      require_once("views/include/dashboard.php");
      require_once("views/modules/user_mod/user.egreso.php");
      require_once("views/include/footer.php");
    }else{
      header("Location: inicio");
    }
  }
  public function recover(){
    if (!isset($_SESSION["user"])) {
      require_once("views/modules/user_mod/recuperar.php");
      require_once("views/include/footer.php");
    }else{
      header("Location: dashboard");
    }
  }
  public function validEmail(){
      $data[0] = $_POST["data"];
      $result = $this->UserM->readUserbyDocument($data);
      if(count($result[0])>=1){
        $return = (true);
      }else{
        $return = (false);
      }
      echo json_encode($return);
  }
  public function recuperarPass(){
      $data[0] = $_POST["data"];
      $result = $this->UserM->readUserbyDocument($data);
      $data[1]=$result['use_code'];
      if(count($result[0])<1){
        $return = array(falsEe,"El documento no existe","");
      }else{
        $data[0]=password_hash($data[0],PASSWORD_DEFAULT);
        $this->UserM->updateUserByDoc($data);
        $return = array(true,"La contraseña fue cambiada por el numero de documento","inicio");
      }
      echo json_encode($return);
  }
  public function documento(){
      $data[0] = $_POST["data"];
      $result = $this->UserM->readUserbyDocument($data);
      if(count($result[0])>=1){
        $return = array(true,$result['use_code']);
      }else{
        $return = array(false,"");
      }
      echo json_encode($return);
  }
  public function signIn(){
      $data = $_POST["data"];
      $result = $this->UserM->readUserbyDocument($data);
      if (password_verify($data[1],$result["password"])) {
        if ($result["acc_status"]!="Inactivo") {
          $_SESSION["user"]["id"]=$result["use_code"];
          $_SESSION["user"]["rol"]=$result["rol_code"];
          $_SESSION["user"]["name"]=$result["use_firstname"];
          $_SESSION["user"]["cargo"]=$result["use_profession"];
          $_SESSION["user"]["token"]=$result["acc_token"];
          $_SESSION["user"]["email"]=$result["use_mail"];
          if ($result["rol_code"]!="OS7CX80C7QQBLGJV41MB3YY4ZA234O") {
            $return = array(true,"dashboard");
          }else{
            $return = array(true,"stand-user");
          }
        }else{
          $return = array(false,"Su estado es inactivo");
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
        $result=$this->UserM->createUser($data);
        if ($result==23000) {
          $return = array(false,"El Documento ya existe","");
        }else{
          $return = array(true,$msn,"inicio");
        }
      }
    }
    echo json_encode($return);
  }
  public function createIngreso(){
    $data = $_POST["data"];
    $user = $this->UserM->readUserbyDocument($data);
    if (count($user[0])<=0) {
      $return = array(false,"El documento no existe","");
    }else{
      $data[0]=$user['use_code'];
      $repetido=$this->UserM->readIngresoRepetido($data);
      if (count($repetido[0])>=1) {
        $return = array(false,"El Usuario ya registro visita");
      }else{
        for ($i=0; $i <count($data) ; $i++) {
          if (empty($data[$i])) {
            $p=1;
            break;
          }else{
            $p=0;
          }
        }
        if ($p==1) {
          $return = array(false,"Campos Nulos","");
        }else{
          $data[2]=randomAlpha('6');
          $data[3]=date('his');
          $data[4]=date('ymd');
          $this->UserM->createIngreso($data);
          $return = array(true,"Guardo Con Exito","ingreso&token=$data[1]");
        }
      }
    }
    echo json_encode($return);
  }
  public function createSalida(){
    $data = $_POST["data"];
    $user = $this->UserM->readUserbyDocument($data);
    if (count($user[0])<=0) {
      $return = array(false,"El documento no existe","");
    }else{
      $data[0]=$user['use_code'];
      $repetido=$this->UserM->readSalidaRepetido($data);
      if (count($repetido[0])>=1) {
        $return = array(false,"El Usuario ya registro salida");
      }else{
        for ($i=0; $i <count($data) ; $i++) {
          if (empty($data[$i])) {
            $p=1;
            break;
          }else{
            $p=0;
          }
        }
        if ($p==1) {
          $return = array(false,"Campos Nulos","");
        }else{
          $data[2]=randomAlpha('6');
          $data[3]=date('his');
          $data[4]=date('ymd');
          $this->UserM->createSalida($data);
          $return = array(true,"Guardo Con Exito","salida&token=$data[1]");
        }
      }
    }
    echo json_encode($return);
  }
  public function updateStatus(){
    $data = $_POST["data"];
    if (empty($data[0]) || empty($data[1])) {
      $return = array(false,"Campo Nulo","");
    }else{
      $this->UserM->updateStatus($data);
      $return = array(false,"Actualizado con exito","usuarios");
    }
    echo json_encode($return);
  }
  public function updateData(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/user_mod/user.update.php");
    require_once("views/include/footer.php");
  }
  public function update(){
    $data = $_POST["data"];
    for ($i=0; $i <count($data) ; $i++) {
      if (empty($data[$i])) {
        $p=1;
        break;
      }else{
        $p=0;
      }
    }
    if ($p==1) {
      $return = array(false,"Campos Nulos","");
    }else{
      if ($data[7]!=$data[8]) {
        $return = array(false,"Las contraseñas no coinciden","");
      }else{
        $data[7] = password_hash($data[7],PASSWORD_DEFAULT);
        $data[8] = $_SESSION["user"]["id"];
        $this->UserM->updateUser($data);
        $return = array(true,"Guardo Con Exito","cuenta");
      }
    }
    echo json_encode($return);
  }
  public function delete(){
    $field = $_GET["token"];
    $this->UserM->deleteUser($field);
    $msn="Eliminado Con Exito";
    header("Location: usuarios&msn=$msn");
  }
  public function close(){
    session_destroy();
    header("Location: inicio");
  }
}

 ?>
