<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
<?php

$field = $_SESSION["user"]["id"];
foreach ($this->ConferenceM->readConferenceVisit($field) as $row) {
  $p=1;
?>
  <div class="selectconfe" style="width: 60%;">
    <a href="con-memorias&token=<?php echo $row['con_code'] ?>"><?php echo $row['con_name'] ?></a>
  </div>

<?php
}
if (!isset($p)) {
  echo "<h1 class='text-center'>NO HAS REGISTRADO NINGUNA VISITA</h1>";
}
?>
</div>
</div>
