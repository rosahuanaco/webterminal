<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="background-image:url('/webterminal/statics/img/fondo.jpg');">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="titulo">Lista de Chofer</h1>

          </div>
      
        </div>
      </div> /.container-fluid -->
    </section>-->

    <!-- Main content -->
    <section class="content visible" id="ltUsuario">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="sub">Lista de Chofer Registrado</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if(is_array($lista) && count($lista)>0):?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr class="sub">
                    <th>Id</th>
                    <th>Nombre Completo</th>
                    <th>CI</th>
                    <th>Licencia</th>
                    <th>Telefono</th>
                    <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody class="texto">
                    <tr>     
                                
                        <?php foreach($lista as $chofer):?> 
                          <td><?=$chofer->id?></td>
                          <td><?=$chofer->nombre_completo?></td>
                          <td><?=$chofer->ci?></td>
                          <td><?=" Categoria ".$chofer->licencia?></td>
                          <td><?=$chofer->telefono?></td>

                        <td> 
                            <a class="editChofer" href="<?=site_url('chofer/editar')?>/<?=$chofer->id?>" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="deleteChofer" data-id="<?=$chofer->id?>" title="eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872; </i></a>                                                       
                        </td>
                      </tr>
                    <?php endforeach;?>                
                  </tbody>
                  <tfoot>
                  <tr class="sub">
                    <th>Id</th>
                    <th>Nombre Completo</th>
                    <th>CI</th>
                    <th>Licencia</th>
                    <th>Telefono</th>
                    <th>Accion</th>
                  </tr>
                  </tfoot>
                </table>
                <?php else: ?>
                <?="No existe registros."?>
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