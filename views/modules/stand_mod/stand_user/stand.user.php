<?php

$field = $_SESSION["user"]["id"];
foreach ($this->StandM->readStandVisit($field) as $row) {
  $p=1;
?>
  <h2><?php echo $row['sta_name']; ?></h2>
  <a href="expo-memorias&token=<?php echo $row['sta_code'] ?>"><?php echo $row['use_firstname'] ?></a>

<?php
}
if (!isset($p)) {
  echo "NO HAS REGISTRADO NINGUNA VISITA";
}
?>
