<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">ACTUALIZAR STAND</h1>
    <?php $stand = $this->StandM->readStandById($field); ?>
    <form id="frm_sta_u" class="" action="" method="post">
      <div class="modal-body content-update" style="width: 50%;">
        <div class="form-group">
          <div class="">
            <label for="">Actualizar pabellón</label>
          </div>
          <select class="form-control inputmodal" name="">
            <option value="<?php echo $stand['pav_code'] ?>"><?php echo $stand['pav_name']; ?></option>
            <?php
            $data[0]=$stand['pav_code'];
            foreach ($this->StandM->readStandByPav($data) as $row){ ?>
              <option value="<?php echo $row['pav_code'] ?>"><?php echo $row['pav_name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="">
          <label for="">Actualizar nombre</label>
        </div>
        <div class="form-group">
          <input type="text" class="form-control inputmodal" name="" value="<?php echo $stand['sta_name']; ?>">
        </div>
		  <div class="">
          <label for="">Expositor</label>
        </div>
        <div class="form-group">
          <select class="form-control inputmodal" name="" style="visiility:hidden;">
            <option value="<?php echo $stand['use_code'] ?>"><?php echo $stand['use_firstname']; ?></option>
            <?php
            $data[0]=$stand['use_code'];
            foreach ($this->StandM->readUserStand($data) as $row){ ?>
              <option value="<?php echo $row['use_code'] ?>"><?php echo $row['use_firstname']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="">
          <label for="">Actualizar web</label>
        </div>
        <div class="form-group">
          <input type="text" class="form-control inputmodal" name="" value="<?php echo $stand['sta_web']; ?>">
        </div>
        <div class="">
          <label for="">Actualizar correo</label>
        </div>
        <div class="form-group">
          <input type="text" class="form-control inputmodal" name="" value="<?php echo $stand['sta_mail']; ?>">
        </div>
        <div class="">
          <label for="">Actualizar teléfono</label>
        </div>
        <div class="form-group">
          <input type="text" class="form-control inputmodal" name="" value="<?php echo $stand['sta_numcontact']; ?>">
        </div>
        <div class="">
          <label for="">Actualizar descripción</label>
        </div>
        <div class="form-group">
          <textarea name="name" class="form-control inputmodal textareamodal"><?php echo $stand['sta_descrip']; ?></textarea>
        </div>
        <input type="hidden" name="" value="<?php echo $stand['sta_code']; ?>">
        <button type="submit" class="btnmodal" style="width: 100%;" name="button">ACTUALIZAR</button>
      </div>
    </form>
  </div>
</div>
