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
          <h2 class="text-center">¿NO TIENES CUENTA AÚN?</h2>
          <a href="registro"><button type="button" name="button" id="btn-reg">¡REGISTRATE!</button></a>
        </div>
        <!-- FORMULARIO LOGIN-->
        <div class="col-xs-12 col-md-6 col-md-offset-6 secformlogin" id="secformlogin">
          <h1 class="text-center">¡ENTRAR!</h1>
          <form id="frm_log" class="" method="post">
            <div class="form-group">
              <input id="ema_log" type="text" class="form-control input1" required="">
              <label class="label1"><i class="fa fa-envelope" aria-hidden="true"></i> EMAIL</label>
            </div>
            <div class="form-group">
              <input id="pas_log" type="password" class="form-control input1" required="">
              <label class="label1"><i class="fa fa-lock" aria-hidden="true"></i> CONTRASEÑA</label>
            </div>
            <button id="btn_log" type="submit" class="btn-log">INGRESAR</button>
            <a href="registro"><button type="button" class="btn-reg" onclick="abrir()">¡REGISTRATE!</button></a>
          </form>
          <!-- nombre,apellido,tipo doc,num id,email,contraseña,repcontra,cargo(rol) -->
        </div>
      </div>
    </div>
