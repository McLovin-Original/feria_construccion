<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 top-menu">
      <div class="container-imagen">
        <img src="views/assets/img/logosenadash.png" alt="">
      </div>
      <button type="button" name="button" class="btn-menu" data-toggle="collapse" data-target="#collapsito"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
      <div class="collapse btnuser" id="collapsito">
        <a href="cerrar"><i class="fa fa-sign-out" aria-hidden="true"></i> CERRAR SESIÓN</a>
      </div>
    </div>
  </div>

  <!-- SIDE NAV -->
  <div class="row">
    <div class="side-nav" id="sidenav">
      <div class="sidenav-line"></div>
      <h4 class="text-center title-menu"> MENÚ </h4>
      <div class="sidenav-line1"></div>
      <ul>
        <?php if ($_SESSION["user"]["rol"]!="OS7CX80C7QQBLGJV41MB3YY4ZA234O"){ ?>
          <a href="dashboard"><li><i class="fa fa-home icon" aria-hidden="true"></i> INICIO</li></a>
        <?php } ?>
        <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47"){ ?>
          <a href="eventos"><li><i class="fa fa-calendar-check-o icon" aria-hidden="true"></i> EVENTOS</li></a>
        <?php } ?>
        <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47" || $_SESSION["user"]["rol"]==="ASEV4G5GVCG5A7O38DKS8W2EDDE42A" ){ ?>
        <a data-toggle="collapse" data-target="#collapsote2"><li class="licollapse"><i class="fa fa-bookmark icon" aria-hidden="true"></i> CONFERENCIAS</li></a>
        <div class="collapse" id="collapsote2">
          <a href="conferencias"><li><i class="fa fa-users icon" aria-hidden="true"></i> GESTIONAR CONFERENCIAS</li></a>
          <a href="conference-select"><li><i class="fa fa-user" aria-hidden="true"></i> VISITANTE POR CONFERENCIA</li></a>
        </div>
        <a href="conference-select-qr"><li><i class="fa fa-qrcode icon" aria-hidden="true"></i> CONFERENCIA QR</li></a>
        <?php } ?>
        <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47"){ ?>
        <a href="pabellon"><li><i class="fa fa-map-marker icon" aria-hidden="true"></i> PABELLONES</li></a>
        <?php } ?>
        <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47" || $_SESSION["user"]["rol"]==="E3HDKX3684UTA7DMHFOAA34HAK39PM" ){ ?>
        <a data-toggle="collapse" data-target="#collapsote"><li class="licollapse"><i class="fa fa-bookmark icon" aria-hidden="true"></i> STAND'S</li></a>
        <div class="collapse" id="collapsote">
          <a href="stands"><li><i class="fa fa-user" aria-hidden="true"></i> GESTIONAR STANDS</li></a>
          <a href="stand-select"><li><i class="fa fa-user" aria-hidden="true"></i> VISITANTE POR STAND</li></a>
        </div>
        <a href="stand-select-qr"><li><i class="fa fa-qrcode icon" aria-hidden="true"></i> STAND QR</li></a>
        <?php } ?>
        <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47"){ ?>
        <a href="usuarios"><li><i class="fa fa-lock icon" aria-hidden="true"></i> GESTIONAR SEGURIDAD</li></a>
        <a href="reportes"><li><i class="fa fa-file-text-o icon" aria-hidden="true"></i> REPORTES</li></a>
        <?php } ?>
        <?php if ($_SESSION["user"]["rol"]==="OS7CX80C7QQBLGJV41MB3YY4ZA234O"){  ?>
          <a href="stand-user"><li><i class="fa fa-user icon" aria-hidden="true"></i> STANDS</li></a>
          <a href="conference-user"><li><i class="fa fa-bookmark icon" aria-hidden="true"></i> CONFERENCIAS</li></a>
        <?php } ?>
        <?php if ($_SESSION["user"]["rol"]!=="F34L2P7GPT9RHI37S306OFVI16TI47") {
        ?>
        <a href="cuenta"><li><i class="fa fa-user icon" aria-hidden="true"></i>MI CUENTA</li></a>
      <?php  } ?>
      </ul>
    </div>
  </div>
</div>
