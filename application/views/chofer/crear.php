<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="background-image:url('/webterminal/statics/img/fondo.jpg');">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="titulo">Chofer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nuevo</a></li>
              <li class="breadcrumb-item active">Chofer</li>
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
                <h3 class="sub">Formulario de Nuevo Chofer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="color:red;" id="mensaje"></div>
                <form id="frmchofer" action="<?=site_url('chofer/guardar')?>">
                  <input type="hidden" name="id" value="">
                  
                  <div class="row mb-3">
                        <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
                        <div class="col-sm-2">
                            <input name="nombres" class="form-control" id="nombres" class="form-control" placeholder="Nombres" data-bind="value:nombres">
                            <div class="help-block with-errors"></div>
                        </div>
                        <label for="apellido_paterno" class="col-sm-2 col-form-label">Apellido Paterno:</label>
                        <div class="col-sm-2">
                          <input name="apellido_paterno" class="form-control" placeholder="Apellido Paterno" id="apellido_paterno"  data-bind="value:apellido_paterno">                      
                          <div class="help-block with-errors"></div>
                        </div>
                        <label for="apellido_materno" class="col-sm-2 col-form-label">Apellido Materno:</label>
                        <div class="col-sm-2">
                          <input name="apellido_materno" class="form-control" placeholder="Apellido Materno" id="apellido_materno"  data-bind="value:apellido_materno">                      
                          <div class="help-block with-errors"></div>
                        </div>
                   </div>                              

                  <div class="form-group row">
                    <label for="ci" class="col-sm-2 col-form-label">CI:</label>
                    <div class="col-sm-2">
                      <input name="ci"  class="form-control" placeholder="Ci" id="ci" min="0" data-bind="value:ci" required>                      
                      <div class="help-block with-errors"></div>
                    </div>
                    <label for="licencia" class="col-sm-2 col-form-label">Licencia:</label>
                    <div class="col-sm-2">
                      <select class="form-control" id="licencia" name="licencia">
                              <option value="A">Categoria A</option>
                              <option value="B">Categoria B</option>
                              <option value="C">Categoria C</option>
                              <option value="T">Categoria T</option>
                      </select>
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
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Registrar</button>
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