<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">ACTUALIZAR CONFERENCIA</h1>
    <?php $con = $this->ConferenceM->readConferenceById($field); ?>
    <form id="frm_con_u" class="" action="" method="post" data-parsley-validate>
      <div class="modal-body content-update" style="width: 50%;">
        <div class="form-group">
          <div class="">
            <label for="">Actualizar día</label>
          </div>
          <select class="form-control inputmodal" name="">
            <option value="<?php echo $con['day_code'] ?>"><?php echo $con['day_current']; ?></option>
            <?php
            $data[0]=$con['eve_code'];
            $data[1]=$con['day_code'];
            foreach ($this->ConferenceM->readDiaByEventUpdate($data) as $row){ ?>
              <option value="<?php echo $row['day_code'] ?>"><?php echo $row['day_current']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="">
          <label for="">Actualizar conferencista</label>
        </div>
        <div class="form-group">
          <select class="form-control inputmodal" name="">
            <option value="<?php echo $con['use_code'] ?>"><?php echo $con['use_firstname']; ?></option>
            <?php
            $data[0]=$con['use_code'];
            foreach ($this->ConferenceM->readUserConference($data) as $row){ ?>
              <option value="<?php echo $row['use_code'] ?>"><?php echo $row['use_firstname']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="">
          <label for="">Actualizar nombre de la conferencia</label>
        </div>
        <div class="form-group">
          <input type="text" class="form-control inputmodal" name="" value="<?php echo $con['con_name']; ?>" placeholder="">
        </div>
        <div class="">
          <label for="">Actualizar hora inicio</label>
        </div>
        <div class="form-group">
          <input type="time" class="form-control inputmodal" name="" value="<?php echo $con['con_startime']; ?>" placeholder="">
        </div>
        <div class="">
          <label for="">Actualizar hora fin</label>
        </div>
        <div class="form-group">
          <input type="time" class="form-control inputmodal" name="" value="<?php echo $con['con_finishtime']; ?>" placeholder="">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control inputmodal" name="" value="<?php echo $con['con_share']; ?>" placeholder="">
        </div>
        <div class="">
          <label for="">Actualizar descripción</label>
        </div>
        <div class="form-group">
          <textarea class="form-control inputmodal textareamodal"><?php echo $con['con_description']; ?></textarea>
        </div>
        <input type="hidden" value="<?php echo $con['con_code']; ?>" >
        <button type="submit" class="btnmodal" style="width: 100%;">ACTUALIZAR</button>
      </div>
    </form>
  </div>
</div>
