<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-image:url('/webterminal/statics/img/fondo.jpg');">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="titulo">Lista de Buses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div> /.container-fluid -->
    </section>-->

    <!-- Main content -->
    <section class="content visible" id="ltpublicacion">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="sub">Lista: </h3>
              </div>
              <?php if(is_array($buses) && count($buses)>0):?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr class="sub">
                  <th>Id</th>
                    <th>Chofer</th>
                    <th>Placa</th>
                    <th>Tipo de bus</th>
                    <th>Filas</th>
                    <th>Columnas</th>
                    <th>Piso</th>
                    <th>Estado</th>
                    <th>Foto</th>
                    <th>Subir</th>
                    <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody class="texto">
                    <?php foreach($buses as $bus):?> 
                      <tr class="<?=$bus->estado=='Inactivo'?'inactivo':''?>">          
                      <td><?=$bus->id?></td>   
                        <td><?=$bus->placa?></td>
                        <td><?=$bus->tipo?></td>
                        <td><?=$bus->comodidad?></td>
                        <td><?=$bus->filas?></td>
                        <td><?=$bus->columnas?></td>
                        <td><?=$bus->piso?></td>
                        <td class="estado"><?=$bus->estado?></td> 
                        <td>
                        <?php
                        $foto=$bus->imagen;

                        if($foto=="")
                        {
                          //mostrar una una imagen por defecto
                          ?>
                          <img width="100" src="<?php echo base_url(); ?>uploads/buses/perfil.jpg">
                          <?php
                        }
                        else
                        {
                          //mostrar la fot del usuario
                          ?>
                          <img width="100" src="<?php echo base_url(); ?>uploads/buses/<?php echo $foto; ?>">
                          <?php
                        }
                          

                        ?>

                        </td> 
                        <td>
                          <?php
                          echo form_open_multipart('bus/subirimagen');
                          ?>
                          <input type="hidden" name="idbuses" value="<?php echo $bus->id; ?>">
                          <button type="submit" class="btn btn-primary btn-xs">Subir</button>
                          <?php
                          echo form_close();
                          ?>
                        </td>

                        <td> 
                            <a class="editarBus" href="<?=site_url('bus/editar')?>/<?=$bus->id?>" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="deleteBus desactivar <?=$bus->estado=='Activo'?'d-block':'d-none'?>" data-id="<?=$bus->id?>" title="Desactivar" data-toggle="tooltip"><i class="material-icons disabled_by_default"></i></a>                        
                            <a class="deleteBus activar <?=$bus->estado=='Inactivo'?'d-block':'d-none'?>" data-id="<?=$bus->id?>" title="Activar" data-toggle="tooltip"><i class="material-icons dp48">check_circle</i></a>
                        </td>
                      </tr>
                    <?php endforeach;?>                
                  </tbody>
                  <tfoot>
                  <tr class="sub">
                  <th>Id</th>
                    <th>Chofer</th>
                    <th>Placa</th>
                    <th>tipo</th>
                    <th>Filas</th>
                    <th>Pisos</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Foto</th>
                    <th>Subir</th>
                    <td>Accion</td>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <?php else: ?>
              <div>Lista de Buses vacia.</div>
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