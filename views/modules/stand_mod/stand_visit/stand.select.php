<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">SELECCIONE EL STAND</h1>
    <?php

    foreach ($this->StandM->readStand() as $row) {
    ?>
    <a href="stand-visit&token=<?php echo $row['sta_code']; ?>"><?php echo $row["sta_name"]; ?></a>
    <?php } ?>
  </div>
</div>
