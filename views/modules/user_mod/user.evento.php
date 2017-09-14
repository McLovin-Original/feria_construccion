<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">SELEECIONE EL EVENTO</h1>
    <?php
    if ($_GET["token"]==1){
       $url="ingreso&token=";
     }else{
       $url="salida&token=";
     } ?>
    <?php
      foreach ($this->UserM->readEvent() as $row) {
    ?>
      <div class="selectconfe" styssssssssssssssssssssssssssssssssssssssssssssle="width: 60%;">
        <a href="<?php echo $url.$row['day_code']; ?>"><?php echo $row["eve_name"]; ?></a>
      </div>
    <?php } ?>
  </div>
</div>
