<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1>SELEECIONE EL EVENTO</h1>
    <?php
      foreach ($this->UserM->readEvent() as $row) {
    ?>
      <div class="selectconfe" style="width: 60%;">
        <a href="ingreso&token=<?php echo $row['day_code']; ?>"><?php echo $row["eve_name"]; ?></a>
      </div>
    <?php } ?>
  </div>
</div>
