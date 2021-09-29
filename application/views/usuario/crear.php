<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="background-image: linear-gradient(#ffffff, #114A7F);">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="titulo">Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nuevo</a></li>
              <li class="breadcrumb-item active">Usuario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">                
                <h3 class="sub">Formulario de nuevo usuario</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="color:red;" id="mensaje"></div>
                <form id="frmusuario" action="<?=site_url('usuario/guardar')?>">
                  <input type="hidden" name="id" value="">
                  
                  <div class="row mb-3">
                             <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" id="email" data-bind="value:Email" required>
                             </div>
                   </div>

                  <div class="row mb-3">
                           <label for="password" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                               <input name="password" type="password" class="form-control" id="password" data-bind="value:Contraseña" required>
                          </div>
                  </div>

                  <div class="form-group row">
                    <label for="privilegio" class="col-sm-2 col-form-label">Privilegio:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="privilegio" name="privilegio">
                        <?php foreach($privilegios as $privilegio):?> 
                          <?php if($privilegio->nombre != 'App'):?>
                            <option value="<?=$privilegio->id?>"><?=$privilegio->nombre?></option>
                          <?php endif;?>
                        <?php endforeach;?>
                      </select>
                    </div>                    
                  </div>


                  <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombres:</label>
                    <div class="col-sm-10">
                      <input name="nombre" class="form-control" placeholder="Nombre" id="nombre"  data-bind="value:nombre" required>                      
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="apellido_paterno" class="col-sm-2 col-form-label">Apellido Paterno:</label>
                    <div class="col-sm-10">
                      <input name="apellido_paterno" class="form-control" placeholder="Apellido Paterno" id="apellido_paterno"  data-bind="value:apellido_paterno">                      
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="apellido_materno" class="col-sm-2 col-form-label">Apellido Materno:</label>
                    <div class="col-sm-10">
                      <input name="apellido_materno" class="form-control" placeholder="Apellido Materno" id="apellido_materno"  data-bind="value:apellido_materno">                      
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>                                   

                  <div class="form-group row">
                    <label for="ci" class="col-sm-2 col-form-label">CI:</label>
                    <div class="col-sm-10">
                      <input name="ci"  class="form-control" placeholder="Ci" id="ci" min="0" data-bind="value:ci" required>                      
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                    <div class="col-sm-10">
                      <input name="telefono"  class="form-control" placeholder="telefono" id="telefono" min="0" data-bind="value:telefono" required>                      
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="direccion" class="col-sm-2 col-form-label">Dirección:</label>
                    <div class="col-sm-10">
                      <input name="direccion"  class="form-control" placeholder="direccion" id="direccion">                      
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  

                  
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                    </div>
                  </div>
                </form>
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