<?php
$code=$_SESSION["user"]["id"];
$confe=$this->ConferenceM->readConferenceByUser($code);
$field=$confe['con_code'];
$result=$this->ConferenceM->readConferenceById($field);
if (count($result[0])<=0 && $_SESSION["user"]["rol"]==="ASEV4G5GVCG5A7O38DKS8W2EDDE42A"){
  header("Location: invalid-conference");
}
?>
<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR MEMORIAS</h1>
    <?php if ($_SESSION["user"]["rol"]==="ASEV4G5GVCG5A7O38DKS8W2EDDE42A"){ ?>
    <div class="col-xs-12 col-md-3 col-md-offset-9">
      <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UNA MEMORIA DE CONFERENCIA</button>
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
            if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47") {
              $method=$this->ConferenceM->readConferenceMemoriesAdmin();
            }else{
              $method=$this->ConferenceM->readConferenceMemories($code);
            }
            $item=1;
            foreach ($method as $row) {
            ?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $row["fic_name"]; ?></td>
              <td><?php echo $row["con_name"]; ?></td>
              <td><a href="views/assets/conference/<?php echo $code ?>/<?php echo $row['fic_file'] ?>"><?php echo $row["fic_file"]; ?></a></td>
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
          <div class="form-group">
            <input type="text" name="data[]" class="form-control inputmodal" placeholder="Nombre" required="">
          </div>
          <div class="form-group">
            <input type="file" name="conf" class="form-control inputmodal" required="">
          </div>
          <div class="form-group">
            <textarea name="data[]" rows="8" cols="80"></textarea>
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
