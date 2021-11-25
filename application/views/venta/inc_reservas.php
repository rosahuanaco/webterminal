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
                        <td><?=$reserva->nombre." ".$reserva->apellido_paterno." ".$reserva->apellido_materno?></td>
                        <td><?=$reserva->razon_social?></td>
                        <td><?=$reserva->nit_ci?></td>
                        <td><?=$reserva->viaje?></td>
                        <td><?=convertDateTimeRev($reserva->fecha_reserva)?></td>
                        <td><?=$reserva->total?></td>
                        <td> 
                        <button type="button" href="<?=base_url()?>venta/detalle/<?=$reserva->id?>" class="btn btn-primary confirmModal" data-toggle="modal" data-target="#confirmarModal">
                          Confirmar
                        </button>                        
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

              <!-- Modal -->
              <div class="modal fade" id="confirmarModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title center" id="confirmModal">NOTA DE VENTA</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary" id="btnVender">Vender</button>
                    </div>
                  </div>
                </div>
              </div>
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