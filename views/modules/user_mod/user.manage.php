<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR USUARIOS</h1>
    <a class="btnprimario col-md-offset-9" style="text-decoration:none; color: white" href="seleccion-evento&token=1">Registrar Ingreso</a>
    <a class="btnprimario" style="text-decoration:none; color: white" href="seleccion-evento&token=2">Registrar Salida</a>
        <table  id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOMBRE</th>
              <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47") {
              ?>
              <th>DOCUMENTO</th>
              <th>ROL</th>
              <th>CORREO</th>
              <th>CELULAR</th>
              <?php } ?>
              <th>CARGO</th>
              <th>INSTITUCION</th>
              <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47"){ ?>
              <th>ESTADO</th>
              <th>ACCIONES</th>
              <?php } ?>
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
              <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47") {
              ?>
              <td><?php echo $row["use_docu"]; ?></td>
              <td><?php echo $row["rol_name"]; ?></td>
              <td><?php echo $row["use_mail"] ?></td>
              <td><?php echo $row["use_cellphone"] ?></td>
              <?php } ?>
              <td><?php echo $row["use_profession"] ?></td>
              <td><?php echo $row["use_institution"] ?></td>
              <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47") {
              ?>
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
              <?php } ?>
            </tr>
          <?php  }  ?>
          </tbody>
        </table>
  </div>
</div>
