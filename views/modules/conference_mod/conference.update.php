<?php $con = $this->ConferenceM->readConferenceById($field); ?>
<form id="frm_con_u" class="" action="" method="post" data-parsley-validate>
  <select name="">
    <option value="<?php echo $con['day_code'] ?>"><?php echo $con['day_current']; ?></option>
    <?php
    $data[0]=$con['eve_code'];
    $data[1]=$con['day_code'];
    foreach ($this->ConferenceM->readDiaByEventUpdate($data) as $row){ ?>
      <option value="<?php echo $row['day_code'] ?>"><?php echo $row['day_current']; ?></option>
    <?php } ?>
  </select>
  <input type="text" name="" value="<?php echo $con['con_name']; ?>" placeholder="">
  <input type="text" name="" value="<?php echo $con['con_exhibitor']; ?>" placeholder="">
  <input type="time" name="" value="<?php echo $con['con_startime']; ?>" placeholder="">
  <input type="time" name="" value="<?php echo $con['con_finishtime']; ?>" placeholder="">
  <input type="number" name="" value="<?php echo $con['con_share']; ?>" placeholder="">
  <textarea rows="8" cols="80"><?php echo $con['con_description']; ?></textarea>
  <input type="hidden" value="<?php echo $con['con_code']; ?>" >
  <button type="submit">ACTUALIZAR</button>
</form>
