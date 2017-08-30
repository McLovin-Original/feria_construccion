<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">SELECCIONE LA CONFERENCIA</h1>
    <div class="content-event-dias">
      <?php
      if ($_SESSION["user"]["rol"]=="ASEV4G5GVCG5A7O38DKS8W2EDDE42A") {
        $code = $_SESSION["user"]["id"];
        $method=$this->ConferenceM->readConferenceByUser($code);
      }else{
        $method=$this->ConferenceM->readConference();
      }
      foreach ($method as $row) {
        ?><div class="selectconfe">
            <a href="conference-visit&token=<?php echo $row['con_code']; ?>"><?php echo $row["con_name"]; ?></a>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
