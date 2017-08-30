<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">ACTUALIZAR PABELLON</h1>
    <?php $pav = $this->PavilionM->readPavilionById($field); ?>
    <form id="frm_pav_u" class="" action="" method="post">
      <select name="">
        <option value="<?php echo $pav['day_code'] ?>"><?php echo $pav['day_current']; ?></option>
        <?php
        $data[0]=$pav['eve_code'];
        $data[1]=$pav['day_code'];
        foreach ($this->PavilionM->readDiaByEventUpdate($data) as $row){ ?>
          <option value="<?php echo $row['day_code'] ?>"><?php echo $row['day_current']; ?></option>
        <?php } ?>
      </select>
      <input type="text" name="" value="<?php echo $pav['pav_name']; ?>">
      <input type="hidden" name="" value="<?php echo $pav['pav_code']; ?>">
      <button type="submit">ENVIAR</button>
    </form>
  </div>
</div>
