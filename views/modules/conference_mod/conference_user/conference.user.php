<?php

$field = $_SESSION["user"]["id"];
foreach ($this->ConferenceM->readConferenceVisit($field) as $row) {
  $p=1;
?>
  <h2><?php echo $row['con_name']; ?></h2>
  <a href="con-memorias&token=<?php echo $row['con_code'] ?>"><?php echo $row['use_firstname'] ?></a>

<?php
}
if (!isset($p)) {
  echo "NO HAS REGISTRADO NINGUNA VISITA";
}
?>
