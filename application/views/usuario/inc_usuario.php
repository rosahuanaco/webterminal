<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="background-image: linear-gradient(#ffffff, #114A7F);">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="titulo">Lista de Usuarios</h1>

          </div>
      
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content visible" id="ltUsuario">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="sub">Listado</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr class="sub">
                  <th>Id Usuario</th>
                  <th>Nombre Usuario</th>
                    <th>Email</th>
                    <th>CI</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody class="texto">
                    <tr>     
                                
                        <?php foreach($users as $user):?> 
                          <td><?=$user->id?></td>
                          <td><?=$user->nombre." ".$user->apellido_paterno." ".$user->apellido_materno?></td>
                          <td><?=$user->email?></td>
                          <td><?=$user->ci?></td>
                      
                          <td><?=$user->estado?></td>

                        <td> 
                            <a class="editUsuario" href="<?=site_url('usuario/editar')?>/<?=$user->id?>" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="deleteUsuario" data-id="<?=$user->id?>" title="eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872; </i></a>                                                       
                        </td>
                      </tr>
                    <?php endforeach;?>                
                  </tbody>
                  <tfoot>
                  <tr class="sub">
                    <th>Id Usuario</th>
                    <th>Nombre Usuario</th>   
                    <th>Email</th>
                    <th>CI</th>
                    <th>Estado</th>
                  </tr>
                  </tfoot>
                </table>
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