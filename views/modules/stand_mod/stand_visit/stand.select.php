<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
	  
    <?php
    if ($_SESSION["user"]["rol"]=="E3HDKX3684UTA7DMHFOAA34HAK39PM") {
      $code = $_SESSION["user"]["id"];
      $row = $this->StandM->readStandByUser($code);
	  if(count($row[0])<1){
		  echo '<h1 class="text-center">AÚN NO TIENES ASIGNADO UN STAND</h1>';
	  }else{
		  echo '<h1 class="text-center">SELECCIONE EL STAND</h1>';
	  ?>
      <div class="selectconfe" style="width: 60%;">
        <a href="stand-visit&token=<?php echo $row['sta_code']; ?>"><?php echo $row["sta_name"]; ?></a>
      </div>
      <?php
	  }
    }else{
      foreach ($this->StandM->readStand() as $row) {
      ?>
      <div class="selectconfe" style="width: 60%;">
        <a href="stand-visit&token=<?php echo $row['sta_code']; ?>"><?php echo $row["sta_name"]; ?></a>
      </div>
    <?php } ?>
  <?php } ?>
  </div>
</div>
