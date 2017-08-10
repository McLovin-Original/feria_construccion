 <div class="container-fluid" id="main-content">
   <div class="content-welcome" id="contentwelcome">
     <h1 class="text-center">GESTIONAR EVENTOS</h1>
     <div class="col-xs-12 col-md-3 col-md-offset-9">
       <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UN EVENTO</button>
     </div>
     <?php
     $dia=1;
     foreach ($this->EventM->readDay($field) as $row){ ?>
     <h2>DIA<?php echo $dia; ?></h2>
     <form action="update-dia" method="post" data-parsley-validate>
       <input type="hidden" name="data[]" value="<?php echo $row['day_code']; ?>">
       <input type="hidden" name="data[]" value="<?php echo $field ?>">
       <input type="hidden" name="data[]" value="<?php echo "DIA".$dia++; ?>">
       <input type="date"   name="data[]" value="<?php echo $row['day_date'] ?>">
       <input type="time"   name="data[]" value="<?php echo $row['day_startime'] ?>">
       <input type="time"   name="data[]" value="<?php echo $row['day_finishtime'] ?>">
       <textarea name="data[]" rows="8" cols="40"><?php echo $row['day_date'] ?></textarea>
       <button type="submit" name="button">GUARDAR DIA</button>
     </form>
     <?php } ?>
   </div>
 </div>
