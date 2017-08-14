<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR MEMORIAS</h1>
    <div class="col-xs-12 col-md-3 col-md-offset-9">
      <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UNA MEMORIA DE EXPOSICION</button>
    </div>
        <table id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>#</th>
              <th>NOMBRE</th>
              <th>STAND</th>
              <th>ARCHIVO</th>
              <th>DESCRIPCION</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47") {
              $method=read
            }
            $item=1;
            foreach ($this->StandM->readStandMemories() as $row) {
            ?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $row["fis_name"]; ?></td>
              <td><?php echo $row["sta_name"]; ?></td>
              <td><?php echo $row["fis_file"]; ?></td>
              <td><?php echo $row["fis_description"]; ?></td>
              <td>
                <a onclick="return confirm('Desea Eliminar?')" href="delete-memoristand&token=<?php echo $row['sta_code']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
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
        <h1 class="text-center titulomodal">AGREGAR MEMORIA</h1>
      </div>
      <div class="modal-body">
        <form id="frm_sta" class="" action="" method="post">
          <div class="form-group">
            <input type="text" name="" class="form-control inputmodal" placeholder="nombre" required="">
          </div>
          <div class="form-group">
            <input type="text" name="" class="form-control inputmodal" placeholder="Sitio Web">
          </div>
          <div class="form-group">
            <input type="email" name="" class="form-control inputmodal" placeholder="Correo" required="">
          </div>
          <div class="form-group">
            <input type="number" name="" class="form-control inputmodal" placeholder="Numero Contacto" required="">
          </div>
          <div class="form-group">
            <textarea name="" rows="8" cols="80"></textarea>
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
