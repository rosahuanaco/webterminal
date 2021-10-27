<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="background-image:url('/webterminal/statics/img/fondo.jpg');">

    <!-- Main content -->
    <section class="content visible" id="ltpublicacion">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="sub">Lista de Publicacion de viajes</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if(is_array($viajes) && count($viajes)>0):?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr class="sub">
                  <th>Id Viaje</th>
                  <th>Bus</th>
                    <th>Origen</th>
                    <th>Destino</th>   
                    <th>Fecha de Viaje y hora</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody class="texto">                                                        
                        <?php foreach($viajes as $viaje):?> 
                          <tr class="<?=$viaje->estado=='Inactivo'?'inactivo':''?>"> 
                            <td><?=$viaje->id?></td>
                            <td><?=$viaje->bus?></td>
                            <td><?=$viaje->origen?></td>
                            <td><?=$viaje->destino?></td>
                            <td><?=$viaje->fecha_salida?></td>
                            <td><?=$viaje->precio?></td>
                            <td class="estado"><?=$viaje->estado?></td>
                          
                          
                            <td> 
                                <a class="edit" href="<?=site_url('viaje/editar')?>/<?=$viaje->id?>" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a class="deleteViaje desactivar <?=$viaje->estado=='Activo'?'d-block':'d-none'?>" data-id="<?=$viaje->id?>" title="Desactivar" data-toggle="tooltip"><i class="material-icons disabled_by_default"></i></a>                        
                                <a class="deleteViaje activar <?=$viaje->estado=='Inactivo'?'d-block':'d-none'?>" data-id="<?=$viaje->id?>" title="Activar" data-toggle="tooltip"><i class="material-icons dp48">check_circle</i></a>
                            </td>
                          </tr>
                    <?php endforeach;?>                
                  </tbody>
                  <tfoot>
                  <tr class="sub">
                  <th>Id Viaje</th>
                  <th>Bus</th>
                    <th>Origen</th>
                    <th>Destino</th>   
                    <th>Fecha de Viaje y hora</th>
                    <th>Precio</th>
                    <th>Estado</th>
                  </tr>
                  </tfoot>
                </table>
                <?php endif;?>
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