<div class="container-fluid" id="main-content">
  <div class="content-welcome" id="contentwelcome">
    <h1 class="text-center">BIENVENIDO <?php echo strtoupper($_SESSION["user"]["name"]); ?></h1>
    <!-- <button type="button" name="button">ENTRAR ></button> -->
    		<canvas id="myChart" class="grafica"></canvas>

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
