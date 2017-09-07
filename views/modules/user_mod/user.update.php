<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">ACTUALIZAR MI CUENTA</h1>
    <?php
     $field = $_SESSION["user"]["id"];
     $user = $this->UserM->readUserbyId($field); ?>
    <form id="frm_user_up" class="" action="" method="post">
      <div class="modal-body content-update">
        <div class="">
          <label for="">Actualizar Correo</label>
        </div>
        <div class="form-group">
          <input type="email" class="form-control inputmodal" name="data" value="<?php echo $user['use_mail']; ?>">
        </div>
        <div class="">
          <label for="">Actualizar Nombre</label>
        </div>
        <div class="form-group">
          <input type="text" class="form-control inputmodal" name="data" value="<?php echo $user['use_firstname']; ?>">
        </div>
        <div class="">
          <label for="">Actualizar Apellido</label>
        </div>
        <div class="form-group">
          <input type="text" class="form-control inputmodal" name="data" value="<?php echo $user['use_lastname']; ?>">
        </div>
        <div class="">
          <label for="">Actualizar Celular</label>
        </div>
        <div class="form-group">
          <input type="number" class="form-control inputmodal" name="data" value="<?php echo $user['use_cellphone']; ?>">
        </div>
        <div class="">
          <label for="">Actualizar Genero</label>
        </div>
        <div class="form-group">
          <?php if ($user["use_gender"]=="MASCULINO"){
            $genero = "FEMENINO";
          }else{
            $genero = "MASCULINO";
          } ?>
          <select class="form-control inputmodal" name="data" required="">
            <option value="<?php echo $user['use_gender'] ?>"><?php echo $user['use_gender'] ?></option>
            <option value="<?php echo $genero ?>"><?php echo $genero ?></option>
          </select>
        </div>
        <div class="">
          <label for="">Actualizar Institucion</label>
        </div>
        <div class="form-group">
          <input type="text" class="form-control inputmodal" name="data" value="<?php echo $user['use_institution']; ?>">
        </div>
        <div class="">
          <label for="">Actualizar Cargo</label>
        </div>
        <div class="form-group">
          <select class="form-control inputmodal" name="data" required="">
            <option value="">SELECCIONE UNA OPCION</option>
            <option value="Aprendiz">Aprendiz</option>
            <option value="Instructor">Instructor</option>
            <option value="Administrativo">Administrativo</option>
            <option value="Empresario">Empresario</option>
            <option value="Otro">Otro</option>
          </select>
        </div>
        <button type="submit" class="btnmodal" style="width: 100%;">ACTUALIZAR</button>
      </div>
    </form>
  </div>
</div>
