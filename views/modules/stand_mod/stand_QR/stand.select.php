<?php
require_once 'views/assets/phpqrcode/qrlib.php';
foreach ($this->StandM->readStand() as $row) {
  $code=$row["sta_code"];
  $dir="views/assets/qr/$code/";
  $filename = $dir.$row["sta_name"].".png";

  $size = 10;
  $level = 'H';
  $framaSize = 3;
  $contenido = $code;

  QRcode::png($contenido,$filename,$level,$size,$framaSize);
  ?>
  <h1>NOMBRE STAND: <?php echo strtoupper($row["sta_name"]); ?></h1>
  <?php
  echo '<img src="'.$filename.'"/>';
  }
   ?>
