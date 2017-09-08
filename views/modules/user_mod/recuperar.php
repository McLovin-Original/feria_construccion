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
        <!-- IMAGEN DEL LOGIN -->
        <div class="hidden-xs col-md-6 imglogin" id="imglog">
          <div class="filtrologin"></div>
          <h2 class="text-center">¿YA TIENES CUENTA?</h2>
          <a href="inicio"><button type="button" name="button" id="btn-reg">INICIA</button></a>
        </div>
        <!-- FORMULARIO LOGIN-->
        <div class="col-xs-12 col-md-6 col-md-offset-6 secformlogin" id="secformlogin">
          <h1 class="text-center">RECUPERAR CONTRASEÑA!</h1>
          <form id="frm_recuperar" class="" method="post">
            <div class="form-group">
              <input id="rec_doc" type="number" class="form-control input1" required="">
              <label class="label1"><i class="fa fa-envelope" aria-hidden="true"></i> DOCUMENTO</label>
            </div>
            <button id="btn_log" type="submit" class="btn-log">RECUPERAR</button>

          </form>
          <!-- nombre,apellido,tipo doc,num id,email,contraseña,repcontra,cargo(rol) -->
        </div>
      </div>
    </div>
