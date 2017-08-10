<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR STAND'S</h1>
    <div class="col-xs-12 col-md-3 col-md-offset-9">
      <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UN STAND</button>
    </div>
        <table  id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>ID</th>
              <th>PERSONA</th>
              <th>CORREO</th>
              <th>UBICACION</th>
              <th>CARGO</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>id</td>
              <td>persona</td>
              <td>correo</td>
              <td>ubicacion</td>
              <td>cargo</td>
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
        <h1 class="text-center titulomodal">AGREGAR STAND</h1>
      </div>
      <div class="modal-body">
        <form class="" action="index.html" method="post">
          <div class="form-group">
            <input type="text" name="" class="form-control inputmodal" placeholder="nombre" required="">
          </div>
          <div class="form-group">
            <input type="text" name="" class="form-control inputmodal" placeholder="nombre" required="">
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
