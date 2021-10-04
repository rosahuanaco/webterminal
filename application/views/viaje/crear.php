<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="background-image:url('/webterminal/statics/img/fondo.jpg');">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="titulo">Viajes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Viajes</a></li>
              <li class="breadcrumb-item active">Nuevo</li>
            </ol>
          </div>
        </div>
      </div> /.container-fluid -->
    </section>-->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">                
                <h3 class="sub">Formulario de Nuevo Viaje</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="color:red;" id="mensaje"></div>
                <form id="frmviaje" action="<?=site_url('viaje/guardar')?>">
                  <input type="hidden" name="id" value="">
                  <div class="form-group row">
                    <label for="origen" class="col-sm-2 col-form-label">Seleccionar Origen:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="origen" name="origen">
                        <?php foreach($departamentos as $departamento):?> 
                            <option value="<?=$departamento->id?>"><?=$departamento->nombre?></option>
                        <?php endforeach;?>
                      </select>
                      <div id="origen-error" class="help-block with-errors d-none" style="color:red;">Origen y Destino no debe ser igual.</div>
                    </div>                    
                  </div>

              <div class="form-group row">
                    <label for="destino" class="col-sm-2 col-form-label">Seleccionar Destino:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="destino" name="destino">
                      <?php foreach($departamentos as $departamento):?> 
                            <option value="<?=$departamento->id?>"><?=$departamento->nombre?></option>
                        <?php endforeach;?>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-group row">
                    <label for="bus" class="col-sm-2 col-form-label">Seleccionar Bus:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="bus" name="bus">
                        <?php foreach($buses as $bus):?> 
                            <option value="<?=$bus->id?>"><?=$bus->placa.'->'.$bus->tipo?></option>
                        <?php endforeach;?>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-group row">
                    <label for="chofer" class="col-sm-2 col-form-label">Seleccionar Chofer:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="chofer" name="chofer">
                        <?php foreach($chofers as $chofer):?> 
                            <option value="<?=$chofer->id?>"><?=$chofer->nombres.' '.$chofer->apellido_paterno.' '.$chofer->apellido_materno?></option>
                        <?php endforeach;?>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-group row">
                    <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                    <div class="col-sm-10">
                      <input name="precio" type="number" class="form-control" placeholder="Precio" id="precio" min="0" data-bind="value:precio" required>                      
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-10">
                      <input name="fecha" type="text" class="form-control" placeholder="Fecha(<?=date('d/m/Y H:i:s')?>)" id="fecha" min="0" data-bind="value:fecha" required>
                    </div>
                  </div>

                  
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Registrar</button>
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