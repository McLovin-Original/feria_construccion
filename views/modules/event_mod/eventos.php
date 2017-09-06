<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR EVENTOS</h1>
    <div class="col-xs-12 col-md-3 col-md-offset-9">
      <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UN EVENTO</button>
    </div>
        <table  id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>#</th>
              <th>NOMBRE</th>
              <th>FECHA INICIO</th>
              <th>FECHA FIN</th>
              <th>DIAS</th>
              <th>USUARIO</th>
              <th>QR</th>
              <th>GESTIONAR DIAS</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            <?php
             $item=1;
             foreach ($this->EventM->readEvent() as $row) {
            ?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $row["eve_name"]; ?></td>
              <td><?php echo $row["eve_startdate"]; ?></td>
              <td><?php echo $row["eve_finishdate"]; ?></td>
              <td><?php echo $row["eve_numday"]; ?></td>
              <td><?php echo $row["use_firstname"]; ?></td>
              <td><a href="event_qr&token=<?php echo $row['eve_code']; ?>"><span class="glyphicon glyphicon-qrcode"></span></a></td>
              <td><a href="dias&token=<?php echo $row['eve_code']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
              <td>
                <a onclick="return confirm('Desea Eliminar?');" href="delete-evento&token=<?php echo $row['eve_code'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
            <?php   }   ?>
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
        <h1 class="text-center titulomodal">AGREGAR EVENTO</h1>
      </div>
      <div class="modal-body">
        <form id="frm_eve" class="" action="" method="post" data-parsley-validate>
          <div class="form-group">
            <input type="text" name="data" class="form-control inputmodal" placeholder="Nombre" required="">
          </div>
          <div class="form-group">
            <input type="date" name="data" class="form-control inputmodal" placeholder="fecha inicio" required="">
          </div>
          <div class="form-group">
            <input type="date" name="data" class="form-control inputmodal" placeholder="fecha fin" required="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btncerrarmodal" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btnmodal">AGREGAR</button>
      </form>
      </div>
    </div>
  </div>
</div>
