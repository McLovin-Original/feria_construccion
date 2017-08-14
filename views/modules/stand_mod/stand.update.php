<?php $stand = $this->StandM->readStandById($field); ?>
<form id="frm_sta_u" class="" action="" method="post">
  <select name="">
    <option value="<?php echo $stand['pav_code'] ?>"><?php echo $stand['pav_name']; ?></option>
    <?php
    $data[0]=$stand['pav_code'];
    foreach ($this->StandM->readStandByPav($data) as $row){ ?>
      <option value="<?php echo $row['pav_code'] ?>"><?php echo $row['pav_name']; ?></option>
    <?php } ?>
  </select>
  <input type="text" name="" value="<?php echo $stand['sta_name']; ?>">
  <input type="text" name="" value="<?php echo $stand['sta_web']; ?>">
  <input type="text" name="" value="<?php echo $stand['sta_mail']; ?>">
  <input type="text" name="" value="<?php echo $stand['sta_numcontact']; ?>">
  <textarea name="name" rows="8" cols="80"><?php echo $stand['sta_descrip']; ?></textarea>
  <input type="hidden" name="" value="<?php echo $stand['sta_code']; ?>">
  <button type="submit" name="button">ACTUALIZAR</button>
</form>
