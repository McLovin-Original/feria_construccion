<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">QR STAND</h1>
    <div class="content-event-dias">
    <?php
    require_once 'views/assets/phpqrcode/qrlib.php';
    foreach ($this->StandM->readStand() as $row) {
      ?><div class="content-secundario-event-dias"><?php
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
 </div>
 </div>
 </div>
</div>
