<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">SELECCIONE LA CONFERENCIA</h1>
    <?php

    foreach ($this->ConferenceM->readConference() as $row) {
    ?>
    <a href="conference-visit&token=<?php echo $row['con_code']; ?>"><?php echo $row["con_name"]; ?></a>
    <?php } ?>
  </div>
</div>
