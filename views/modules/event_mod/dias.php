 <div class="container-fluid" id="main-content">
   <div class="content-welcome" id="contentwelcome">
     <h1 class="text-center">GESTIONAR DIAS</h1>
     <div class="content-event-dias">
         <?php
         $dia=1;
         foreach ($this->EventM->readDay($field) as $row){ ?>
           <div class="content-secundario-event-dias">
           <h2>DIA<?php echo $dia; ?></h2>
           <form action="update-dia" method="post" data-parsley-validate>
             <input type="hidden" name="data[]" value="<?php echo $row['day_code']; ?>">
             <input type="hidden" name="data[]" value="<?php echo $field ?>">
             <input type="hidden" name="data[]" value="<?php echo "DIA".$dia++; ?>">
             <h4 class="h41">Fecha</h4>
             <input type="date"   name="data[]" value="<?php echo $row['day_date'] ?>">
             <h4 class="h42">Hora Inicio</h4>
             <input type="time"   name="data[]" value="<?php echo $row['day_startime'] ?>">
             <h4 class="h43">Hora Fin</h4>
             <input type="time"   name="data[]" value="<?php echo $row['day_finishtime'] ?>">
             <textarea name="data[]" style="width: 88%; height: 129px;" placeholder="Descripción"><?php echo $row['day_descrip'] ?></textarea>
             <button type="submit" name="button">GUARDAR DIA</button>
           </form>
           </div>
         <?php } ?>
     </div>
   </div>
 </div>
