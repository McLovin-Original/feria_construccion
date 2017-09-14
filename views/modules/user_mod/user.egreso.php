<div class="container-fluid" id="main-content">
  <div class="content-welcome flexible" id="contentwelcome">
    <h1 class="text-center">REGISTRA LA SALIDA</h1>
    <form action="" id="frm_salida" method="post" data-parsley-validate>
      <input id="document" name="data" type="number" class="inputmodal inputvisitas" placeholder="documento">
      <input type="hidden" name="data" value="<?php echo $field; ?>">
      <button id="btn_doc" class="btnmodal" type="submit">REGISTRA LA SALIDA</button>
    </form>
    <table id="dataTable" class="table table-striped table-bordered tabla">
      <thead>
        <th>#</th>
        <th>USUARIO</th>
        <th>DOCUMENTO</th>
        <th>CELULAR</th>
      </thead>
      <tbody>
        <?php $item=1;
            foreach ($this->UserM->readUserSalida($field) as $row) {
              ?>
        <tr>
          <td><?php echo $item++; ?></td>
          <td><?php echo $row["use_firstname"]." ".$row["use_lastname"]; ?></td>
          <td><?php echo $row["use_docu"]; ?></td>
          <td><?php echo $row["use_cellphone"]; ?></td>
        </tr>
      <?php  } ?>
      </tbody>
    </table>
  </div>
</div>
