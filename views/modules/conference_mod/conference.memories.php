<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR MEMORIAS</h1>
    <?php if ($_SESSION["user"]["rol"]==="ASEV4G5GVCG5A7O38DKS8W2EDDE42A"){ ?>
    <div class="col-xs-12 col-md-3 col-md-offset-9">
      <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UNA MEMORIA</button>
    </div>
    <?php } ?>
        <table id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>#</th>
              <th>NOMBRE</th>
              <th>CONFERENCIA</th>
              <th>ARCHIVO</th>
              <th>DESCRIPCION</th>
              <?php if ($_SESSION["user"]["rol"]==="ASEV4G5GVCG5A7O38DKS8W2EDDE42A"){ ?>
              <th>ACCIONES</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $item=1;
            $id=$_GET["token"];
            foreach ($this->ConferenceM->readConferenceMemories($id) as $row) {
            ?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $row["fic_name"]; ?></td>
              <td><?php echo $row["con_name"]; ?></td>
              <td><a href="views/assets/conference/<?php echo $id ?>/<?php echo $row['fic_file'] ?>"><?php  $p=explode("-",$row["fic_file"]); echo $p[1] ?></a></td>
              <td><?php echo $row["fic_description"]; ?></td>
              <?php if ($_SESSION["user"]["rol"]==="ASEV4G5GVCG5A7O38DKS8W2EDDE42A"){ ?>
                <td>
                  <a onclick="return confirm('Desea Eliminar?')" href="delete-memoriconfe&token=<?php echo $row['fic_code']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
              <?php } ?>
            </tr>
          <?php  }    ?>
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
        <h1 class="text-center titulomodal">AGREGAR MEMORIA</h1>
      </div>
      <div class="modal-body">
        <form class="" action="crear-conMemoria" method="post" enctype="multipart/form-data">
          <div class="">
            <label>Nombre de memoria</label>
          </div>
          <div class="form-group">
            <input type="text" name="data[]" class="form-control inputmodal" placeholder="Nombre" required="">
          </div>
          <div class="">
            <label>Sube un archivo menor a 8MG - Extencion unicamente zip o rar</label>
          </div>
          <div class="form-group">
            <input type="file" name="conf" class="form-control inputmodal" required="">
          </div>
          <div class="">
            <label>Descripcion</label>
          </div>
          <div class="form-group">
            <textarea name="data[]" class="form-control inputmodal textareamodal"></textarea>
          </div>
          <input type="hidden" name="con_code" value="<?php echo $id ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btncerrarmodal" data-dismiss="modal" name="button">CANCELAR</button>
        <button type="submit" class="btnmodal" name="button">AGREGAR</button>
      </form>
      </div>
    </div>
  </div>
</div>
