<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-image:url('/webterminal/statics/img/fondo.jpg');">
    

    <!-- Main content -->
    <section class="content visible" id="ltpublicacion">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="sub">Ventas</h3>
              </div>
              <div class="container">
                <form id="frmReportes" action="<?=site_url('venta/reporte_detalle')?>">
                  <div class="row">
                    <div class="col col-lg-3">
                    <label>Fecha Inicio:<input name="fecha_inicio" type="text" class="date form-control" value="<?=date("01/m/Y h:i")?>" /></label> 
                    </div>
                    <div class="col col-lg-2">
                    <label>Fecha Fin:<input name="fecha_fin" type="text" class="date form-control" value="<?=date("d/m/Y H:i")?>" /></label>
                    </div>
                    <div class="col col-lg-4">
                      <label>Origen:
                        <select class="form-control" id="origen" name="origen">
                          <option value="0">Todos</option>
                          <?php foreach($departamentos as $departamento):?> 
                              <option value="<?=$departamento->id?>"><?=$departamento->nombre?></option>
                          <?php endforeach;?>
                        </select>
                      </label>
                      -
                      <label>Destino:
                        <select class="form-control" id="destino" name="destino">
                        <option value="0">Todos</option>
                        <?php foreach($departamentos as $departamento):?> 
                              <option value="<?=$departamento->id?>"><?=$departamento->nombre?></option>
                          <?php endforeach;?>
                        </select>
                      </label>
                    </div>
                    <div class="col col-lg-2">
                        <label>Cajero:
                          <select class="form-control" id="cajero" name="cajero">
                          <option value="0">Todos</option>
                          <?php foreach($cajeros as $cajero):?> 
                                <option value="<?=$cajero->id?>"><?=$cajero->nombre.' '.$cajero->apellido_paterno .' '.$cajero->apellido_materno;?></option>
                            <?php endforeach;?>
                          </select>
                        </label>
                    </div>
                    <div class="col col-lg-2">
                        <label>Bus:
                          <select class="form-control" id="bus" name="bus">
                          <option value="0">Todos</option>
                          <?php foreach($buses as $bus):?> 
                                <option value="<?=$bus->id?>"><?=$bus->placa;?></option>
                            <?php endforeach;?>
                          </select>
                        </label>
                    </div>
                    <div class="col col-lg-1 align-items-center">                      
                      <label></label>
                      <button type="submit" class="btn btn-primary">Generar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="min-height:600px;" id="reporte_detalle" >
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