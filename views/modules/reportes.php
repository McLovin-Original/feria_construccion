<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR DE REPORTES</h1>
    <div class="contenedor-infos">
      <div class="contenedor-total-personas">
        <h1>TOTAL PERSONAS</h1>
        <h4>54</h4>
      </div>
      <div class="contenedor-total-stands">
        <h1>TOTAL STAND'S</h1>
        <h4>15</h4>
      </div>
      <div class="contenedor-total-conferencias">
        <h1>TOTAL CONFERENCIAS</h1>
        <h4>8</h4>
      </div>
    </div>
    <div class="contenedor-graficas">
      <div class="grafica1">
        <canvas id="myChart" class="grafica"></canvas>
      </div>
      <div class="grafica2">
        <canvas id="myChart2" class="grafica"></canvas>
      </div>
    </div>
    <div class="col-xs-12 col-md-3 col-md-offset-9 btnclassdiv">
      <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UN PABELLON</button>
    </div>
        <table  id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>NOMBRE</th>
              <th>ARCHIVO</th>
              <th>FECHA</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>reporte_jueves</td>
              <td>repjue.docx</td>
              <td>10/10/2017</td>
              <td><a href=""><span class="glyphicon glyphicon-pencil"></span></a> <a href=""><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
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
        <h1 class="text-center titulomodal">AGREGAR DOCUMENTO DE REPORTE</h1>
      </div>
      <div class="modal-body">
        <form class="" action="index.html" method="post">
          <div class="form-group">
            <input type="text" name="" class="form-control inputmodal" placeholder="nombre" required="">
          </div>
          <div class="form-group">
            <label>Subir documento</label>
            <input type="file" name="" class="form-control inputmodal" placeholder="archivo" required="">
          </div>
          <div class="form-group">
            <input type="date" name="" class="form-control inputmodal" placeholder="fecha" required="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btncerrarmodal" data-dismiss="modal" name="button">CANCELAR</button>
        <button type="button" class="btnmodal" name="button">AGREGAR</button>
      </form>
      </div>
    </div>
  </div>
</div>
