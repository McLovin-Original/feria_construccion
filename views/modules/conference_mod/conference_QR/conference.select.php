<?php
require_once 'views/assets/phpqrcode/qrlib.php';
foreach ($this->ConferenceM->readConference() as $row) {
  $code=$row["con_code"];
  $dir="views/assets/qr_conf/$code/";
  $filename = $dir.$row["con_name"].".png";

  $size = 10;
  $level = 'H';
  $framaSize = 3;
  $contenido = $code;

  QRcode::png($contenido,$filename,$level,$size,$framaSize);
  ?>
  <h1>NOMBRE CONFERENCIA: <?php echo strtoupper($row["con_name"]); ?></h1>
  <?php
  echo '<img src="'.$filename.'"/>';
  }
   ?>
