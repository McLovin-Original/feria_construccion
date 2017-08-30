<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">SELECCIONE LA CONFERENCIA</h1>
    <?php
    if ($_SESSION["user"]["rol"]=="F34L2P7GPT9RHI37S306OFVI16TI47") {
      $method=$this->ConferenceM->readConference();
    }else{
      $code = $_SESSION["user"]["id"];
      $method=$this->ConferenceM->readConferenceByUser($code);
      if (count($method[0])<=0){
        header("Location: invalid-conference");
      }
    }
    foreach ($method as $row) {
      ?>
      <a href="con-memorias&token=<?php echo $row['con_code']; ?>"><?php echo $row['con_name']; ?></a>
    <?php } ?>
  </div>
</div>
