 <div class="container-fluid" id="main-content">
   <div class="content-welcome" id="contentwelcome">
     <h1 class="text-center">GESTIONAR EVENTOS</h1>
     <div class="col-xs-12 col-md-3 col-md-offset-9">
       <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UN EVENTO</button>
     </div>
    <?php for ($i=0; $i <=$event["eve_numday"]; $i++) {
       ?>
     <form id="frm_dia" action="" method="post" data-parsley-validate>
       <input type="text" name="data" value="<?php echo $field ?>">
       <input type="date" name="data" value="">
       <input type="time" name="data" value="">
       <input type="time" name="data" value="">
       <textarea name="data" rows="8" cols="40"></textarea>
       <button type="submit" name="button">GUARDAR DIA</button>
     </form>
     <?php }  ?>
   </div>
 </div>
