<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR STAND'S</h1>
    <div class="col-xs-12 col-md-6 col-md-offset-6">
      <button type="button" class="btnprimario btnlargo" data-target="#modalito" data-toggle="modal">+ AGREGAR UN NUEVO STAND</button>
      <a href="expo-memorias" class="btnprimario btnlargo btnadminmemori">ADMINISTRAR MEMORIAS</a>
    </div>
        <table id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>#</th>
              <th>NOMBRE</th>
              <th>PABELLON</th>
              <th>EXPOSITOR</th>
              <th>CORREO</th>
              <th>CONTACTO</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item=1;
            foreach ($this->StandM->readStand() as $row) {
            ?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $row["sta_name"]; ?></td>
              <td><?php echo $row["pav_name"]; ?></td>
              <td><?php echo $row["use_firstname"]; ?></td>
              <td><?php echo $row["sta_mail"]; ?></td>
              <td><?php echo $row["sta_numcontact"]; ?></td>
              <td>
                <a href="update-stand&token=<?php echo $row['sta_code']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                <a onclick="return confirm('Desea Eliminar?')" href="delete-stand&token=<?php echo $row['sta_code']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
            </tr>
          <?php  }    ?>
          </tbody>
        </table>
  </div>
</div>
<!-- MODAL -->
<div id="modalito" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="text-center titulomodal">AGREGAR STAND</h1>
      </div>
      <div class="modal-body">
        <form id="frm_sta" class="" action="" method="post">
          <div class="">
            <label>Nombre</label>
          </div>
          <div class="form-group">
            <input type="text" name="" class="form-control inputmodal" placeholder="Nombre" required="">
          </div>
          <div class="">
            <label>Pabellon</label>
          </div>
          <div class="form-group">
            <select class="form-control inputmodal" name="" required>
              <option value="">SELECCIONE UN PABELLON</option>
              <?php foreach ($this->StandM->readPavilion() as $row){  ?>
              <option value="<?php echo $row['pav_code'] ?>"><?php echo $row["pav_name"]; ?></option>
            <?php } ?>
            </select>
          </div>
          <div class="">
            <label>Expositor</label>
          </div>
          <div class="form-group">
            <select class="form-control inputmodal" >
              <option value="">SELECCIONE UN EXPOSITOR</option>
              <?php foreach ($this->StandM->readStandUser() as $row){  ?>
              <option value="<?php echo $row['use_code'] ?>"><?php echo $row["use_firstname"]." ".$row["use_lastname"]; ?></option>
            <?php } ?>
            </select>
          </div>
          <div class="">
            <label>Sitio Web</label>
          </div>
          <div class="form-group">
            <input type="text" name="" class="form-control inputmodal" placeholder="Sitio Web">
          </div>
          <div class="">
            <label>Correo</label>
          </div>
          <div class="form-group">
            <input type="email" name="" class="form-control inputmodal" placeholder="Correo" required="">
          </div>
          <div class="">
            <label>Numero de contacto</label>
          </div>
          <div class="form-group">
            <input type="number" name="" class="form-control inputmodal" placeholder="Número Contacto" required="">
          </div>
          <div class="">
            <label>Descripcion</label>
          </div>
          <div class="form-group">
            <textarea class="form-control inputmodal textareamodal" name="" placeholder="Descripción"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btncerrarmodal" data-dismiss="modal" name="button">CANCELAR</button>
        <button type="submit" class="btnmodal" name="button">AGREGAR</button>
      </form>
      </div>
    </div>
  </div>
</div>
