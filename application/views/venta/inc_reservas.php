<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-image:url('/webterminal/statics/img/fondo.jpg');">
    

    <!-- Main content -->
    <section class="content visible" id="ltpublicacion">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="sub">Reservas</h3>
              </div>
              <?php if(is_array($reservas) && count($reservas)>0):?>
              <!-- /.card-header -->
              <div class="card-body">
                <p>Escriba algo en el campo de entrada para buscar en la tabla por Pasajero, Razon social, Nit, Fecha, Total :</p>  
                <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
                <br>
                <table id="reservas" class="table table-bordered table-striped">
                  <thead>
                  <tr class="sub">
                    <th>Id</th>
                    <th>Pasajero</th>
                    <th>Razon social | Nombre</th>
                    <th>Nit | Ci</th>
                    <th>Origen-Destino</th>
                    <th>Fecha Reserva</th>
                    <th>Total</th>
                    <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody class="texto">
                    <?php foreach($reservas as $reserva):?> 
                      <tr>          
                        <td><?=$reserva->id?></td>   
                        <td><?=$reserva->pasajero?></td>
                        <td><?=$reserva->nombre?></td>
                        <td><?=$reserva->nit_ci?></td>
                        <td><?=$reserva->viaje?></td>
                        <td><?=$reserva->fecha?></td>
                        <td><?=$reserva->total?></td>
                        <td> 
                            <a href="#">Confirmar</a>
                        </td>
                      </tr>
                    <?php endforeach;?>                
                  </tbody>
                  <tfoot>
                  <tr class="sub">
                    <th>Id</th>
                    <th>Pasajero</th>
                    <th>Razon social | Nombre</th>
                    <th>Nit | Ci</th>
                    <th>Origen-Destino</th>
                    <th>Fecha Reserva</th>
                    <th>Total</th>
                    <th>Accion</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <?php else: ?>
              <div>No existe reservas.</div>
              <?php endif; ?>
              <!-- /.card-body -->
            </div>
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->    
  </div>