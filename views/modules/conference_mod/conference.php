<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR CONFERENCIAS</h1>
    <div class="col-xs-12 col-md-4 col-md-offset-8">
      <button type="button" class="btnprimario btnlargo" data-target="#modalito" data-toggle="modal">+ AGREGAR UNA CONFERENCIA</button>
    </div>
        <table  id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>#</th>
              <th>TITULO</th>
              <th>CONFERENCISTA</th>
              <th>DIA</th>
              <th>HORA INICIAL</th>
              <th>HORA FINAL</th>
              <th>MAX PERSONAS</th>
              <th>DESCRIPCION</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $item=1;
              foreach ($this->ConferenceM->readConference() as $row) {
              ?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $row["con_name"]; ?></td>
              <td><?php echo $row["use_firstname"]; ?></td>
              <td><?php echo $row["day_current"]; ?></td>
              <td><?php echo $row["con_startime"]; ?></td>
              <td><?php echo $row["con_finishtime"]; ?></td>
              <td><?php echo $row["con_share"]; ?></td>
              <td><?php echo $row["con_description"] ?></td>
              <td>
                <a href="update-conferencia&token=<?php echo $row['con_code']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                <a onclick="return confirm('Dese Eliminar?')" href="delete-conferencia&token=<?php echo $row['con_code']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
            </tr>
          <?php  }   ?>
          </tbody>
        </table>
  </div>
</div>
<a href="con-memorias">ADMINISTRAR MEMORIAS</a>
<!-- MODAL -->
<div id="modalito" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="text-center titulomodal">AGREGAR CONFERENCIA</h1>
      </div>
      <div class="modal-body">
        <form id="frm_con" class="" action="" method="post">
          <div class="form-group">
            <input type="text" name="data" class="form-control inputmodal" placeholder="titulo" required="">
          </div>
          <div class="form-group">
            <select class="" id="con_user">
              <option value="">SELECCIONE UN CONFERENCISTA</option>
              <?php foreach ($this->ConferenceM->readConferenceUser() as $row){  ?>
              <option value="<?php echo $row['use_code'] ?>"><?php echo $row["use_firstname"]; ?></option>
            <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <select class="" id="sel_evento">
              <option value="">SELECCIONE UN EVENTO</option>
              <?php foreach ($this->ConferenceM->readEvent() as $row){  ?>
              <option value="<?php echo $row['eve_code'] ?>"><?php echo $row["eve_name"]; ?></option>
            <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <select class="" name="data" id="sel_dia">
              <option value="">AUN NO HA SELECCIONADO UN EVENTO</option>
            </select>
          </div>
          <div class="form-group">
            <input type="time" name="data" class="form-control inputmodal" required="">
          </div>
          <div class="form-group">
            <input type="time" name="data" class="form-control inputmodal" required="">
          </div>
          <div class="form-group">
            <input type="number" name="data" class="form-control inputmodal" placeholder="Cantidas Personas" required="">
          </div>
          <div class="form-group">
            <textarea name="data" rows="8" cols="80"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btncerrarmodal" data-dismiss="modal" name="button">CANCELAR</button>
        <button type="submit" class="btnmodal" name="button">AGREGAR</button>
      </form>
      </div>
    </div>
  </div>
</div>
