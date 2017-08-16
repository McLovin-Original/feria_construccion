<?php

foreach ($this->StandM->readStand() as $row) {
?>
<a href="stand-qr&token=<?php echo $row['sta_code']; ?>"><?php echo $row["sta_name"]; ?></a>
<?php } ?>
