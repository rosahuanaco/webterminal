<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="background-image: linear-gradient(#ffffff, #114A7F);">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chofer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Editar</a></li>
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
                <h3 class="card-title">FORMULARIO DE Chofer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="color:red;" id="mensaje"></div>
                <form id="frmchofereditar" action="<?=site_url('chofer/guardar')?>">
                  <input type="hidden" name="id" value="<?=$chofer->id?>">
                  
                  <div class="row mb-3">
                        <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
                        <div class="col-sm-2">
                            <input name="nombres" class="form-control" value="<?=$chofer->nombres?>" id="nombres" class="form-control" placeholder="Nombres" data-bind="value:nombres">
                            <div class="help-block with-errors"></div>
                        </div>
                        <label for="apellido_paterno" class="col-sm-2 col-form-label">Apellido Paterno:</label>
                        <div class="col-sm-2">
                          <input name="apellido_paterno" class="form-control" value="<?=$chofer->apellido_paterno?>" placeholder="Apellido Paterno" id="apellido_paterno"  data-bind="value:apellido_paterno">                      
                          <div class="help-block with-errors"></div>
                        </div>
                        <label for="apellido_materno" class="col-sm-2 col-form-label">Apellido Materno:</label>
                        <div class="col-sm-2">
                          <input name="apellido_materno" class="form-control" value="<?=$chofer->apellido_materno?>" placeholder="Apellido Materno" id="apellido_materno"  data-bind="value:apellido_materno">                      
                          <div class="help-block with-errors"></div>
                        </div>
                   </div>                              

                  <div class="form-group row">
                    <label for="ci" class="col-sm-2 col-form-label">CI:</label>
                    <div class="col-sm-2">
                      <input name="ci"  class="form-control" value="<?=$chofer->ci?>" placeholder="Ci" id="ci" min="0" data-bind="value:ci" required>                      
                      <div class="help-block with-errors"></div>
                    </div>
                    <label for="licencia" class="col-sm-2 col-form-label">Licencia:</label>
                    <div class="col-sm-2">
                      <select class="form-control" id="licencia" name="licencia">
                              <option value="A" <?=$chofer->licencia=='A'?'selected':''?> >Categoria A</option>
                              <option value="B" <?=$chofer->licencia=='B'?'selected':''?> >Categoria B</option>
                              <option value="C" <?=$chofer->licencia=='C'?'selected':''?> >Categoria C</option>
                              <option value="T" <?=$chofer->licencia=='T'?'selected':''?> >Categoria T</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                    <div class="col-sm-10">
                      <input name="telefono"  class="form-control" value="<?=$chofer->telefono?>" placeholder="telefono" id="telefono" min="0" data-bind="value:telefono" required>                      
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