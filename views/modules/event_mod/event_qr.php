<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">QR EVENTO</h1>
    <div class="content-event-dias">
    <?php
    require_once 'views/assets/phpqrcode/qrlib.php';
    $row = $this->EventM->readEventQr($field)
    ?><div class="content-secundario-event-dias"><?php
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
    <h1>NOMBRE EVENTO: <?php echo strtoupper($row["eve_name"]); ?></h1>
    <?php
    echo '<img src="'.$filename.'"/>';
    ?>
    </div>
  </div>
 </div>
</div>
