<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-image:url('/webterminal/statics/img/fondo.jpg');">
    

    <!-- Main content -->
    <section class="content visible" id="ltpublicacion">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="sub">Reportes</h3>
              </div>
              <div class="container">                
                <form id="frmReportes" action="<?=site_url('venta/reporte_detalle')?>">
                  <div class="row">
                    <div class="col col-lg-3">
                        <label><input type="radio" name="tipo" value="1" checked/> Ingresos</label>
                    </div>
                    <div class="col col-lg-3">
                        <label><input type="radio" name="tipo" value="2"/> Usuarios App </label>
                    </div>
                    <div class="col col-lg-3">
                        <label><input type="radio" name="tipo" value="3"/> Pasajeros </label>
                    </div>
                    <div class="col col-lg-3">
                        <label><input type="radio" name="tipo" value="4"/> Buses </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col col-lg-3 fechainicio">
                    <label>Fecha Inicio:<input name="fecha_inicio" type="text" class="date form-control" value="<?=date("01/m/Y 00:00")?>" /></label> 
                    </div>
                    <div class="col col-lg-2 fechafin">
                    <label>Fecha Fin:<input name="fecha_fin" type="text" class="date form-control" value="<?=date("d/m/Y H:i")?>" /></label>
                    </div>
                    <div class="col col-lg-2 origen">
                      <label>Origen:
                        <select class="form-control" id="origen" name="origen">
                          <option value="0">Todos</option>
                          <?php foreach($departamentos as $departamento):?> 
                              <option value="<?=$departamento->id?>"><?=$departamento->nombre?></option>
                          <?php endforeach;?>
                        </select>
                      </label>
                    </div>
                    <div class="col col-lg-2 destino">
                      <label>Destino:
                        <select class="form-control" id="destino" name="destino">
                        <option value="0">Todos</option>
                        <?php foreach($departamentos as $departamento):?> 
                              <option value="<?=$departamento->id?>"><?=$departamento->nombre?></option>
                          <?php endforeach;?>
                        </select>
                      </label>
                    </div>
                    <div class="col col-lg-2 cajero">
                        <label>Cajero:
                          <select class="form-control" id="cajero" name="cajero">
                          <option value="0">Todos</option>
                          <?php foreach($cajeros as $cajero):?> 
                                <option value="<?=$cajero->id?>"><?=$cajero->nombre.' '.$cajero->apellido_paterno .' '.$cajero->apellido_materno;?></option>
                            <?php endforeach;?>
                          </select>
                        </label>
                    </div>
                    <div class="col col-lg-2 bus">
                        <label>Bus:
                          <select class="form-control" id="bus" name="bus">
                          <option value="0">Todos</option>
                          <?php foreach($buses as $bus):?> 
                                <option value="<?=$bus->id?>"><?=$bus->placa;?></option>
                            <?php endforeach;?>
                          </select>
                        </label>
                    </div>
                    <div class="col col-lg-2 viaje" style="display:none;">
                        <label>Viaje:
                          <select class="form-control" id="viaje" name="viaje">
                          <?php foreach($viajes as $viaje):?> 
                                <option value="<?=$viaje->id?>"><?="Fecha viaje: ".$viaje->fecha_salida." Placa: ".$viaje->placa." Origen: ".$viaje->origen." Destino:".$viaje->destino;?></option>
                            <?php endforeach;?>
                          </select>
                        </label>
                    </div>
                  </div>
                </form>
                <div class="row">
                    <div class="col col-lg-1 align-items-center">                      
                      <label></label>
                      <button class="btn btn-primary" id="btnGeneral">Generar</button>
                    </div>
                    <div class="col col-lg-1 align-items-center">                      
                      <label></label>
                      <input name="urlImprimir" type="hidden" value="<?=site_url('venta/imprimirReporte')?>" id="urlImprimir" />
                      <button class="btn btn-primary" id="btnImprimir">Imprimir</button>
                    </div>
                </div>
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