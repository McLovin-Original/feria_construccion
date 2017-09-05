<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">ACTUALIZAR PABELLON</h1>
    <?php $pav = $this->PavilionM->readPavilionById($field); ?>
    <form id="frm_pav_u" class="" action="" method="post">
      <div class="modal-body content-update">
        <div class="">
          <label for="">Actualizar día</label>
        </div>
        <div class="form-group">
          <select class="form-control inputmodal" name="">
            <option value="<?php echo $pav['day_code'] ?>"><?php echo $pav['day_current']; ?></option>
            <?php
            $data[0]=$pav['eve_code'];
            $data[1]=$pav['day_code'];
            foreach ($this->PavilionM->readDiaByEventUpdate($data) as $row){ ?>
              <option value="<?php echo $row['day_code'] ?>"><?php echo $row['day_current']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="">
          <label for="">Actualizar nombre del pabellon</label>
        </div>
        <div class="form-group">
          <input type="text" class="form-control inputmodal" name="" value="<?php echo $pav['pav_name']; ?>">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control inputmodal" name="" value="<?php echo $pav['pav_code']; ?>">
        </div>
        <button type="submit" class="btnmodal" style="width: 100%;">ENVIAR</button>
      </div>
    </form>
  </div>
</div>
