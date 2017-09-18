<?php
$code=$_SESSION["user"]["id"];
$stand=$this->StandM->readStandByUser($code);
$field=$stand['sta_code'];
$result=$this->StandM->readStandById($field);
if (count($result[0])<=0 && $_SESSION["user"]["rol"]==="E3HDKX3684UTA7DMHFOAA34HAK39PM"){
  header("Location: invalid-stand");
}
?>
<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">GESTIONAR MEMORIAS</h1>
    <?php if ($_SESSION["user"]["rol"]==="E3HDKX3684UTA7DMHFOAA34HAK39PM"){ ?>
    <div class="col-xs-12 col-md-3 col-md-offset-9">
      <button type="button" class="btnprimario" data-target="#modalito" data-toggle="modal">+ AGREGAR UNA MEMORIA</button>
    </div>
    <?php } ?>
        <table id="dataTable" class="table table-striped table-bordered tabla">
          <thead>
            <tr>
              <th>#</th>
              <th>NOMBRE</th>
              <th>STAND</th>
              <th>ARCHIVO</th>
              <?php if ($_SESSION["user"]["rol"]==="E3HDKX3684UTA7DMHFOAA34HAK39PM"){ ?>
              <th>ACCIONES</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($_SESSION["user"]["rol"]==="F34L2P7GPT9RHI37S306OFVI16TI47") {
              $method=$this->StandM->readStandMemoriesAdmin();
            }elseif ($_SESSION["user"]["rol"]==="OS7CX80C7QQBLGJV41MB3YY4ZA234O") {
              $campo = $_GET["token"];
              $method=$this->StandM->readStandMemoriesUser($campo);
            }else{
              $method=$this->StandM->readStandMemories($code);
            }
            $item=1;
            foreach ($method as $row) {
            ?>
            <tr>
              <td><?php echo $item++; ?></td>
              <td><?php echo $row["fis_nom"]; ?></td>
              <td><?php echo $row["sta_name"]; ?></td>
              <td><a href="views/assets/expositor/<?php echo $code ?>/<?php echo $row['fis_file'] ?>"><?php echo $row["fis_file"]; ?></a></td>
              <?php if ($_SESSION["user"]["rol"]==="E3HDKX3684UTA7DMHFOAA34HAK39PM"){ ?>
                <td>
                  <a onclick="return confirm('Desea Eliminar?')" href="delete-memoristand&token=<?php echo $row['fis_code']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
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
        <form class="" action="crear-expoMemoria" method="post" enctype="multipart/form-data">
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
            <input type="file" name="stand" class="form-control inputmodal" required="">
          </div>
          <div class="">
            <label>Descripcion</label>
          </div>
          <div class="form-group">
            <textarea name="data[]" class="form-control inputmodal textareamodal"></textarea>
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
