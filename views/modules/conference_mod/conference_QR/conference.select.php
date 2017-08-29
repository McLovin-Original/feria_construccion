<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">QR CONFERENCIAS</h1>
    <div class="content-event-dias">
    <?php
    require_once 'views/assets/phpqrcode/qrlib.php';
    foreach ($this->ConferenceM->readConference() as $row) {
      ?><div class="content-secundario-event-dias cuadritoqr"><?php
      $code=$row["con_code"];
      $dir="views/assets/qr_conf/$code/";
      $filename = $dir.$row["con_name"].".png";

      $size = 10;
      $level = 'H';
      $framaSize = 3;
      $contenido = $code;

      QRcode::png($contenido,$filename,$level,$size,$framaSize);
      ?>
      <h3>NOMBRE: <?php echo strtoupper($row["con_name"]); ?></h3>
      <?php
      echo '<img src="'.$filename.'"/>';
      }
       ?>
       </div>
    </div>
 </div>
</div>
