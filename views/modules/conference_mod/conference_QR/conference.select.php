<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">QR CONFERENCIAS</h1>
    <div class="content-qr-dad">
    <?php
    require_once 'views/assets/phpqrcode/qrlib.php';
    foreach ($this->ConferenceM->readConference() as $row) {
      ?><div class="content-qr-son">
          <h2><?php echo $row["con_name"]; ?></h2>
        <?php
      $code=$row["con_code"];
      $dir="views/assets/qr_conf/$code/";
      $filename = $dir.$row["con_name"].".png";

      $size = 10;
      $level = 'H';
      $framaSize = 3;
      $contenido = $code;

      QRcode::png($contenido,$filename,$level,$size,$framaSize);
      ?>
      <?php
      echo '<img src="'.$filename.'"/>';
      }
       ?>
       </div>
    </div>
  </div>
</div>
