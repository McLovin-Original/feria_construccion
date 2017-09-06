
<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">QR STAND</h1>
    <div class="content-qr-dad">
    <?php
    require_once 'views/assets/phpqrcode/qrlib.php';
    if ($_SESSION["user"]["rol"]=="F34L2P7GPT9RHI37S306OFVI16TI47") {
      foreach ($this->StandM->readStand() as $row) {
        ?><div class="content-qr-son">
          <h2><?php echo $row["sta_name"]; ?></h2>
          <?php
          $code=$row["sta_code"];
          $dir="views/assets/qr/$code/";
          $filename = $dir.$row["sta_name"].".png";

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
    <?php
    }else{
      $code=$_SESSION["user"]["id"];
      $row=$this->StandM->readStandByUser($code);
        ?><div class="content-qr-son">
          <h2><?php echo $row["sta_name"]; ?></h2>
          <?php
          $code=$row["sta_code"];
          $dir="views/assets/qr/$code/";
          $filename = $dir.$row["sta_name"].".png";

          $size = 10;
          $level = 'H';
          $framaSize = 3;
          $contenido = $code;

          QRcode::png($contenido,$filename,$level,$size,$framaSize);
          ?>
          <?php
          echo '<img src="'.$filename.'"/>';
    } ?>
      </div>
    </div>
  </div>
</div>
