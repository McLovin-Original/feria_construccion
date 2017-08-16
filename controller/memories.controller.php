<?php
require_once("model/user.model.php");
Class MemoriesController{
  private $UserM;

  public function __CONSTRUCT(){
    $this->UserM = new UserModel();
  }
  public function mainPage(){
    require_once("views/include/header.php");
    require_once("views/include/dashboard.php");
    require_once("views/modules/memories_mod/memorias.php");
    require_once("views/include/footer.php");
  }
}
 ?>
