<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR DE REPORTES</h1>
    <div class="contenedor-infos">
      <div class="contenedor-total-personas">
        <h1>TOTAL VISITANTES</h1>
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
      <div class="contenedor-total-personas">
        <h1>PROMEDIO HORA ENTRADA</h1>
        <h4><?php echo $promEntrada[0]; ?></h4>
      </div>
      <div class="contenedor-total-personas">
        <h1>PROMEDIO HORA SALIDA</h1>
        <h4><?php echo $promSalida[0]; ?></h4>
      </div>
    </div>
    <h2 class="text-center">CALIFICACIONES</h2>
    <table  id="dataTable" class="table table-striped table-bordered tabla">
      <thead>
        <tr>
          <th>#</th>
          <th>NOMBRE</th>
          <th>DOCUMENTO</th>
          <th>CELULAR</th>
          <th>Calificacion Conferencias</th>
          <th>Calificacion Stands</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $item=1;
        foreach ($this->ReportM->readCalification() as $row) {
      ?>
        <tr>
          <td><?php echo $item++; ?></td>
          <td><?php echo $row["use_firstname"]." ".$row["use_lastname"]; ?></td>
          <td><?php echo $row["use_docu"]; ?></td>
          <td><?php echo $row["use_cellphone"] ?></td>
          <td><?php echo $row["cal_conf"] ?></td>
          <td><?php echo $row["cal_stand"] ?></td>
        </tr>
      <?php  }  ?>
      </tbody>
    </table>
  </div>
</div>
