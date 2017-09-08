<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR DE REPORTES</h1>
    <div class="contenedor-infos">
      <div class="contenedor-total-personas">
        <h1>TOTAL PERSONAS</h1>
        <h4><?php echo $user[0]; ?></h4>
      </div>
      <div class="contenedor-total-stands">
        <h1>TOTAL STAND'S</h1>
        <h4><?php echo $stand[0]; ?></h4>
      </div>
      <div class="contenedor-total-conferencias">
        <h1>TOTAL CONFERENCIAS</h1>
        <h4><?php echo $confe[0]; ?></h4>
      </div>
      <div class="contenedor-total-stands">
        <h1>STAND MAS VISITADO</h1>
        <h4><?php echo 'FALTA'; ?></h4>
      </div>
      <div class="contenedor-total-conferencias">
        <h1>TOTAL CONFERENCISTAS</h1>
        <h4><?php echo $tConferencistas[0]; ?></h4>
      </div>
      <div class="contenedor-total-stands">
        <h1>TOTAL STANDS VISITADOS</h1>
        <h4><?php echo $useStand[0]; ?></h4>
      </div>
      <div class="contenedor-total-conferencias">
        <h1>TOTAL CONFERENCIAS VISITADAS</h1>
        <h4><?php echo $useConfe[0]; ?></h4>
      </div>
    </div>
    <!--<div class="contenedor-graficas">
      <div class="grafica1">
        <canvas id="myChart" class="grafica"></canvas>
      </div>
      <div class="grafica2">
        <canvas id="myChart2" class="grafica"></canvas>
      </div>
    </div>-->
  </div>
</div>
