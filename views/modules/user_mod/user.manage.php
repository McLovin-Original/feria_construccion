<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR SEGURIDAD</h1>
        <table  id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOMBRE</th>
              <th>DOCUMENTO</th>
              <th>ROL</th>
              <th>CORREO</th>
              <th>CELULAR</th>
              <th>CARGO</th>
              <th>INSTITUCION</th>
              <th>ESTADO</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item=1;
            foreach ($this->UserM->readUser() as $row) {
            ?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $row["use_firstname"]; ?></td>
              <td><?php echo $row["use_docu"]; ?></td>
              <td><?php echo $row["rol_name"]; ?></td>
              <td><?php echo $row["use_mail"] ?></td>
              <td><?php echo $row["use_cellphone"] ?></td>
              <td><?php echo $row["use_profession"] ?></td>
              <td><?php echo $row["use_institution"] ?></td>
              <td><select name="data" onchange="estado('<?php echo $row['acc_token'] ?>',this.value)">
                <?php
                  $estado = $row["acc_status"]=="Activo" ? "Inactivo" : "Activo";
                ?>
                <option value="<?php echo $row["acc_status"] ?>"><?php echo $row["acc_status"] ?></option>
                <option value="<?php echo $estado ?>"><?php echo $estado ?></option>
              </select>
              </td>
              <td>
                <a onclick="return confirm('Desea Eliminar?')" href="delete-user&token=<?php echo $row['use_code']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
            </tr>
          <?php  }  ?>
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
        <h1 class="text-center titulomodal">AGREGAR USUARIO</h1>
      </div>
      <div class="modal-body">
        <form class="" action="index.html" method="post">
          <div class="form-group">
            <input type="text" name="" class="form-control inputmodal" placeholder="nombre" required="">
          </div>
          <div class="form-group">
            <input type="text" name="" class="form-control inputmodal" placeholder="nombre" required="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btncerrarmodal" data-dismiss="modal" name="button">CANCELAR</button>
        <button type="button" class="btnmodal" name="button">AGREGAR</button>
      </form>
      </div>
    </div>
  </div>
</div>
