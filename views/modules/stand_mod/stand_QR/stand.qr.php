<?php
require_once 'views/assets/phpqrcode/qrlib.php';
$field=$_GET["token"];
$dir="views/assets/qr/$field/";
$stand = $this->StandM->readStandById($field);
$filename = $dir.$stand["sta_name"].".png";

$size = 10;
$level = 'H';
$framaSize = 3;
$contenido = $field;

QRcode::png($contenido,$filename,$level,$size,$framaSize);
?>
<h1>NOMBRE STAND: <?php echo strtoupper($stand["sta_name"]); ?></h1>
<?php
echo '<img src="'.$filename.'"/>';
 ?>
