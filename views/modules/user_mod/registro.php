<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EVENTO CONSTRUCCION</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="views/assets/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="views/assets/css/estiloslogin.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">

        <!-- IMAGEN DEL REGISTRO -->
        <div class="hidden-xs col-md-6 imgreg" id="imgreg">
          <div class="filtroreg"></div>
          <h2 class="text-center">¿YA TIENES UNA CUENTA?</h2>
          <a href="inicio"><button type="button" name="button" id="btn-reg1">¡ENTRAR!</button></a>
        </div>
        <!-- FORMULARIO REGISTRO -->
        <div class="col-xs-12 col-md-6 col-md-offset-6 secformreg" id="secformreg">
          <h1 class="text-center">¡REGISTRAR!</h1>
          <form method="post" id="frm_reg">
            <div class="form-group">
              <input type="text" class="form-control input2" required="" name="data">
              <label class="label2"><i class="fa fa-user" aria-hidden="true"></i> NOMBRES</label>
              <input type="text" class="form-control input3" required="" name="data">
              <label class="label3"><i class="fa fa-user" aria-hidden="true"></i> APELLIDOS</label>
            </div>
            <div class="form-group">
              <select class="form-control input3" name="data" required="">
                <option value="">SELECCIONE UNO</option>
                <?php foreach ($this->UserM->readRol() as $row){?>
                  <option value="<?php echo $row['rol_code']; ?>"><?php echo $row["rol_name"]; ?></option>
                <?php } ?>
              </select>
              <label class="label4"><i class="fa fa-id-card" aria-hidden="true"></i> TIPO DE ROL</label>
              <input id="reg_doc" type="number" class="form-control input3" required="" name="data">
              <label class="label3"><i class="fa fa-id-card" aria-hidden="true"></i> NUMERO DE DOCUMENTO</label>
            </div>
            <div class="form-group">
              <input id="reg_email" type="email" class="form-control input2" required="" name="data">
              <label class="label2"><i class="fa fa-envelope" aria-hidden="true"></i> EMAIL</label>
              <select id="reg_sex" class="form-control input3" name="data" required="">
                <option value="">SELECCIONE UNO</option>
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
              </select>
              <label class="label5"><i class="fa fa-neuter" aria-hidden="true"></i> GENERO</label>
            </div>
            <div class="form-group">
              <input min="12" max="99" type="number" class="form-control input2" required="" name="data">
              <label class="label2"><i class="fa fa-user-o" aria-hidden="true"></i> EDAD</label>
              <input type="number" class="form-control input3" required="" name="data">
              <label class="label3"><i class="fa fa-phone" aria-hidden="true"></i> TELEFONO</label>
            </div>
            <div class="form-group">
              <select class="form-control input3" name="data" required="">
                <option value="">SELECCIONE UNO</option>
                <option value="Aprendiz">Aprendiz</option>
                <option value="Instructor">Instructor</option>
                <option value="Administrativo">Administrativo</option>
                <option value="Empresario">Empresario</option>
                <option value="Otro">Otro</option>
              </select>
              <label class="label4"><i class="fa fa-vcard" aria-hidden="true"></i> CARGO</label>
              <input type="text" class="form-control input2" required="" name="data">
              <label class="label3"><i class="fa fa-university" aria-hidden="true"></i> INSTITUCION</label>
            </div>
            <div class="form-group">
              <input type="password" class="form-control input2" required="" name="data">
              <label class="label2"><i class="fa fa-lock" aria-hidden="true"></i> CONTRASEÑA</label>
              <input type="password" class="form-control input3" required="" name="data">
              <label class="label3"><i class="fa fa-lock" aria-hidden="true"></i> REPETIR CONTRASEÑA</label>
            </div>
            <button id="btn_reg" type="submit" class="btn-addreg">!LISTO¡</button>
            <a href="inicio"><button type="button" class="btn-reg1" onclick="cerrar()">¡INGRESAR!</button></a>
          </form>
          <!-- nombre,apellido,tipo doc,num id,email,contraseña,repcontra,cargo(rol) -->
        </div>
      </div>
    </div>
