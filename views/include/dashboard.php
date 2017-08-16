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
        <a href="dashboard"><li><i class="fa fa-home icon" aria-hidden="true"></i> INICIO</li></a>
        <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47"){ ?>
          <a href="eventos"><li><i class="fa fa-calendar-check-o icon" aria-hidden="true"></i> EVENTOS</li></a>
        <?php } ?>
        <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47"){ ?>
        <a href="memorias"><li><i class="fa fa-male icon" aria-hidden="true"></i> EXPOSITORES</li></a>
        <?php } ?>
        <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47" || $_SESSION["user"]["rol"]==="ASEV4G5GVCG5A7O38DKS8W2EDDE42A" ){ ?>
        <a href="conferencias"><li><i class="fa fa-users icon" aria-hidden="true"></i> CONFERENCIAS</li></a>
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
        <?php } ?>
        <?php if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47"){ ?>
        <a href="usuarios"><li><i class="fa fa-lock icon" aria-hidden="true"></i> GESTIONAR SEGURIDAD</li></a>
        <a href="stand-select-qr"><li><i class="fa fa-lock icon" aria-hidden="true"></i> STAND QR</li></a>
        <a href="index.php?c=main&a=reportes"><li><i class="fa fa-file-text-o icon" aria-hidden="true"></i> REPORTES</li></a>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
