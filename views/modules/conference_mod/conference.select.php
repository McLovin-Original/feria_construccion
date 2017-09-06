<?php
   $mensaje="SELECCIONE LA CONFERENCIA";
   if ($_SESSION["user"]["rol"]=="F34L2P7GPT9RHI37S306OFVI16TI47") {
      $method=$this->ConferenceM->readConference();
    }else{
      $code = $_SESSION["user"]["id"];
      $method=$this->ConferenceM->readConferenceByUser($code);
      if (count($method[0])<=0){
        $mensaje="AUN NO TIENES CONFERENCIAS";
      }
    } ?>
<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center"><?php echo $mensaje;?></h1>
    <?php
    foreach ($method as $row) {
      ?>
      <div class="selectconfe">
        <a href="con-memorias&token=<?php echo $row['con_code']; ?>"><?php echo $row['con_name']; ?></a>
      </div>
    <?php } ?>
  </div>
</div>
