 <div class="container-fluid" id="main-content">
   <div class="content-welcome" id="contentwelcome">
     <h1 class="text-center">GESTIONAR DIAS</h1>
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
       <textarea name="data[]" rows="8" cols="40"><?php echo $row['day_descrip'] ?></textarea>
       <button type="submit" name="button">GUARDAR DIA</button>
     </form>
     <?php } ?>
   </div>
 </div>
