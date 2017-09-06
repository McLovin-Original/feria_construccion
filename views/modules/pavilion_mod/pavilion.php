<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR PABELLON</h1>
    <div class="col-xs-12 col-md-3 col-md-offset-9">
      <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UN PABELLON</button>
    </div>
        <table  id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOMBRE</th>
              <th>DIA</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item=1;
            foreach ($this->PavilionM->readPavilion() as $row) {
            ?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $row["pav_name"]; ?></td>
              <td><?php echo $row["day_current"]; ?></td>
              <td>
                <a href="update-pabellon&token=<?php echo $row['pav_code']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                <a onclick="return confirm('Desea Eliminar?');" href="delete-pabellon&token=<?php echo $row['pav_code']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
               </td>
            </tr>
          <?php  }   ?>
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
        <h1 class="text-center titulomodal">AGREGAR PABELLON</h1>
      </div>
      <div class="modal-body">
        <form id="frm_pav" action="" method="post" data-parsley-validate>
          <div class="form-group">
            <input id="nam_pav" type="text" name="" class="form-control inputmodal" placeholder="Nombre" required="">
          </div>
          <div class="form-group">
            <select class="form-control inputmodal" id="sel_evento_p">
              <option value="">SELECCIONE UN EVENTO</option>
              <?php foreach ($this->PavilionM->readEvent() as $row){  ?>
              <option value="<?php echo $row['eve_code'] ?>"><?php echo $row["eve_name"]; ?></option>
            <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control inputmodal" name="data" id="sel_dia_p" required>
              <option value="">AUN NO HA SELECCIONADO UN EVENTO</option>
            </select>
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
