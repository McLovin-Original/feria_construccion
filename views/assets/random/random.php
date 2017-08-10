<?php

function randomAlpha($lenght){
    $characters="abcedefghijklmnopqrstuvxyzABCDEFGHIJKLMNOPQRSTUVXYZ0123456789";
    $characterlen=strlen($characters);
    $random="";
    for ($i=0; $i <$lenght ; $i++) {
      $random.=$characters[rand(0,$characterlen-1)];
    }
    return $random;
}

 ?>
