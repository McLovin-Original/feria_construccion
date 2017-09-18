<div class="container-fluid" id="main-content">
  <div class="content-welcome flexible" id="contentwelcome">
    <h1 class="text-center">REGISTRA EL INGRESO</h1>
    <div class="col-xs-12 col-md-3 col-md-offset-9">
      <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UN USUARIO</button>
    </div>
    <form action="" id="frm_ingreso" method="post" data-parsley-validate>
      <input id="document" name="data" type="number" class="inputmodal inputvisitas" placeholder="documento">
      <input type="hidden" name="data" value="<?php echo $field; ?>">
      <button id="btn_doc" class="btnmodal" type="submit">REGISTRAR INGRESO</button>
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
            foreach ($this->UserM->readUserIngreso($field) as $row) {
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

<!-- MODAL -->
<div id="modalito" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="text-center titulomodal">AGREGAR USUARIO</h1>
      </div>
      <div class="modal-body">
        <form id="frm_reg" method="post">
          <div class="">
            <label>Nombre</label>
          </div>
          <div class="form-group">
            <input type="text" name="data" class="form-control inputmodal" placeholder="Nombre" required="">
          </div>
          <div class="">
            <label>Apellidos</label>
          </div>
          <div class="form-group">
            <input type="text" name="data" class="form-control inputmodal" placeholder="Apellido" required="">
          </div>
          <div class="">
            <label>Tipo de Rol</label>
          </div>
          <div class="form-group">
            <select class="form-control inputmodal" name="data" required="">
              <option value="">SELECCIONE UNO</option>
              <?php foreach ($this->UserM->readRol() as $row){?>
                <option value="<?php echo $row['rol_code']; ?>"><?php echo $row["rol_name"]; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="">
            <label>Documento</label>
          </div>
          <div class="form-group">
            <input id="reg_doc" type="text" name="data" class="form-control inputmodal" placeholder="Documento" required="">
          </div>
          <div class="">
            <label>Correo</label>
          </div>
          <div class="form-group">
            <input id="reg_email" type="email" name="data" class="form-control inputmodal" placeholder="Correo" required="">
          </div>
          <div class="">
            <label>Genero</label>
          </div>
          <div class="form-group">
            <select id="reg_sex" class="form-control inputmodal" name="data" required="">
              <option value="">SELECCIONE UNO</option>
              <option value="MASCULINO">MASCULINO</option>
              <option value="FEMENINO">FEMENINO</option>
            </select>
          </div>
          <div class="">
            <label>Edad</label>
          </div>
          <div class="form-group">
            <input type="number" min="12" max="96" name="data" class="form-control inputmodal" placeholder="Edad" required="">
          </div>
          <div class="">
            <label>Telefono</label>
          </div>
          <div class="form-group">
            <input type="number" name="data" class="form-control inputmodal" placeholder="Telefono" required="">
          </div>
          <div class="">
            <label>Cargo</label>
          </div>
          <div class="form-group">
            <select class="form-control inputmodal" name="data" required="">
              <option value="">SELECCIONE UNO</option>
              <option value="Aprendiz">Aprendiz</option>
              <option value="Instructor">Instructor</option>
              <option value="Administrativo">Administrativo</option>
              <option value="Empresario">Empresario</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <div class="">
            <label>Institucion</label>
          </div>
          <div class="form-group">
            <input type="text" name="data" class="form-control inputmodal" placeholder="Institucion" required="">
          </div>
          <div class="">
            <label>Contraseña</label>
          </div>
          <div class="form-group">
            <input type="password" name="data" class="form-control inputmodal" placeholder="Nombre" required="Contraseña">
          </div>
          <div class="">
            <label>Repetir Contraseña</label>
          </div>
          <div class="form-group">
            <input type="password" name="data" class="form-control inputmodal" placeholder="Repetir Contraseña" required="">
          </div>
          <div class="form-group">
            <a href="http://portal.senasofiaplus.edu.co/index.php/seguridad/politica-de-confidencialidad"><h2 class="text-center">Terminos & Condiciones</h2></a>
            <input class="form-control" id="chek" type="checkbox" name="" value="1">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btncerrarmodal" data-dismiss="modal" name="button">CANCELAR</button>
        <button id="btn_reg" type="submit" class="btnmodal" name="button">AGREGAR</button>
      </form>
      </div>
    </div>
  </div>
</div>
