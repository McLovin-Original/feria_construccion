<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome" style="height: 85vh;">
    <h1 class="text-center">QR EVENTO</h1>
    <div class="content-event-dias">
    <?php
    require_once 'views/assets/phpqrcode/qrlib.php';
    $row = $this->EventM->readEventQr($field)
    ?><div style="width: 100%;">
      <h1 style="text-align: center;">NOMBRE EVENTO: <?php echo $row["eve_name"]; ?></h1>
    <?php
    $code=$row["day_code"];
    $eve=$row["eve_code"];
    $dir="views/assets/event_qr/$eve/";
    $filename = $dir.$row["eve_name"].".png";

    $size = 10;
    $level = 'H';
    $framaSize = 3;
    $contenido = $code;
    QRcode::png($contenido,$filename,$level,$size,$framaSize);
    ?>
    <?php
    echo '<img class="qr-image" style="display: block; margin: 0 auto;" src="'.$filename.'"/>';
    ?>
    </div>
  </div>
 </div>
</div>
