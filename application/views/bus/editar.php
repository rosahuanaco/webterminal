<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="background-image: linear-gradient(#ffffff, #114A7F);">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>BUSES</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Buses</a></li>
              <li class="breadcrumb-item active">Editar</li>
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
                <h3 class="card-title" style="text-aling:center;">FORMULARIO DE BUS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="color:red;" id="mensaje"></div>
                <form id="frmbuseditar" action="<?=site_url('bus/guardar')?>">
                  <input type="hidden" name="id" value="<?=$bus->id?>">
                  <div class="form-group row">
                    <label for="placa" class="col-sm-2 col-form-label">Placa de Bus</label>
                    <div class="col-sm-10">
                      <input name="placa" type="text" value="<?=$bus->placa?>" class="form-control" placeholder="Placa" id="placa" required>                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="tipo" name="tipo">
                            <option value="Semi cama" <?=$bus->tipo=='Semi cama'?'selected':''?> >Semi cama</option>
                            <option value="Cama" <?=$bus->tipo=='Cama'?'selected':''?>>Cama</option>
                            <option value="Leito" <?=$bus->tipo=='Leito'?'selected':''?> >Leito</option>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-group row">
                    <label for="comodidad" class="col-sm-2 col-form-label">Comodidad</label>
                    <div class="col-sm-10">
                      <input name="comodidad" type="text" value="<?=$bus->comodidad?>" class="form-control" placeholder="Caracteristicas especiales" id="comodidad" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-2">
                                          
                    </div>
                    <div class="col-sm-10">
                        <?php if(is_array($reservas) && count($reservas)>0):?>
                          <h3 class="card-title">No se puede modificar asientos porque ya esta; siendo utilizados</h4>
                        <?php else:?>                        
                          <h4 class="card-title">Para eliminar asientos solamente debe dar doble clik en la misma.</h4>
                        <?php endif;?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-2">
                                          
                    </div>
                    <div class="col-sm-2">
                      <label for="pisos">Cantidad pisos</label>
                      <select class="form-control" id="pisos" name="pisos">
                              <option value="1" <?=$bus->piso==1?'selected':''?> >1</option>
                              <option value="2" <?=$bus->piso==2?'selected':''?> >2</option>
                        </select>
                        <br>
                        <h5 for="filas">PISO 1</h5>
                        <table class="table table-responsive">
                              <tbody>
                                  <tr>
                                      <td><label for="filas">Filas</label></td>
                                      <td><input name="filas" type="number" value="<?=$bus->filas?>" class="form-control" placeholder="Filas" id="filas" min="0" data-bind="value:filas" required></td>
                                  </tr>
                                  <tr>
                                      <td><label for="columnas">Columnas</label></td>
                                      <td>
                                          <select class="form-control" id="columnas" name="columnas">
                                                <option value="3" <?=$bus->columnas==3?'selected':''?> >3</option>
                                                <option value="4" <?=$bus->columnas==4?'selected':''?>  >4</option>
                                          </select>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><label for="numeroInicial">Numero Inicial</label></td>
                                      <td><input name="numeroInicial" type="number" value="<?=current($asientos1)?current($asientos1)->numero:''?>" class="form-control" placeholder="Numero asiento" id="numeroInicial" min="0" data-bind="value:numeroInicial" required></td>
                                  </tr>
                              </tbody>
                        </table>                      
                        
                                                                    
                        <div id="inputPiso2" <?=$bus->piso==2?'':'style="display:none;"'?>>
                          <h5>PISO 2</h5>
                          <table class="table table-responsive">
                                <tbody>
                                    <tr>
                                        <td><label for="filas2">Filas</label></td>
                                        <td><input name="filas2" type="number" class="form-control" value="<?=$bus->filas2?>" placeholder="Filas" id="filas2" min="0" data-bind="value:filas2"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="columnas2">Columnas</label></td>                                      
                                        <td>
                                          <select class="form-control" id="columnas2" name="columnas2">
                                                <option value="3" <?=$bus->columnas2==3?'selected':''?>>3</option>
                                                <option value="4" <?=$bus->columnas2==4?'selected':''?>>4</option>
                                          </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="numeroInicial2">Numero Inicial</label></td>
                                        <td><input name="numeroInicial2" type="number" value="<?=current($asientos2)?current($asientos2)->numero:''?>" class="form-control" placeholder="Numero asiento" id="numeroInicial2" min="0" data-bind="value:numeroInicial2"></td>
                                    </tr>
                                </tbody>
                          </table>
                        </div> 
                        <div class="form-group row">
                          <button id="btnGenerar" class="btn btn-primary">Generar</button>
                        </div>
                    </div>
                    <div class="col-sm-4">                        
                        <table class="table table-responsive" id="piso1">
                            <thead>
                                <tr>
                                    <th colspan="4">PISO 1</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php for($i=0;$i<$bus->filas;$i++):?>
                                <tr>
                                <?php for($c=0;$c<$bus->columnas;$c++):?>
                                    <?php $index = ((int)$i*10)+(int)$c; if(isset($asientos1[$index])):?>
                                    <td class="asiento">
                                      <input name='asientoids[]' type='hidden' value='<?=$asientos1[$index]->id?>'>
                                      <input name='numero[]' type='hidden' value='<?=$asientos1[$index]->numero?>'>
                                      <input name='fila[]' type='hidden' value='<?=$asientos1[$index]->fila?>'>
                                      <input name='columna[]' type='hidden' value='<?=$asientos1[$index]->columna?>'>
                                      <input name='piso[]' type='hidden' value='<?=$asientos1[$index]->piso?>'>
                                      <?=$asientos1[$index]->numero?>
                                    </td>                                    
                                    <?php else:?>
                                      <td class="pasillo"></td>
                                    <?php endif;?>
                                    <?php if($c==1):?>
                                      <td class="pasillo"></td>
                                    <?php endif;?>
                                <?php endfor;?>
                                </tr>
                              <?php endfor;?>
                            </tbody>
                        </table>
                      </div>
                      <div class="col-sm-4">
                        <table class="table table-responsive" id="piso2">
                            <thead>
                                <tr>
                                    <th colspan="4">PISO 2</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php for($i=0;$i<$bus->filas2;$i++):?>
                                  <tr>
                                  <?php for($c=0;$c<$bus->columnas2;$c++):?>
                                      <?php $index = ((int)$i*10)+(int)$c; if(isset($asientos2[$index])):?>
                                      <td class="asiento">
                                        <input name='asientoids[]' type='hidden' value='<?=$asientos2[$index]->id?>'>
                                        <input name='numero[]' type='hidden' value='<?=$asientos2[$index]->numero?>'>
                                        <input name='fila[]' type='hidden' value='<?=$asientos2[$index]->fila?>'>
                                        <input name='columna[]' type='hidden' value='<?=$asientos2[$index]->columna?>'>
                                        <input name='piso[]' type='hidden' value='<?=$asientos2[$index]->piso?>'>
                                        <?=$asientos2[$index]->numero?>
                                      </td>                                    
                                      <?php else:?>
                                        <td class="pasillo"></td>
                                      <?php endif;?>
                                      <?php if($c==1):?>
                                        <td class="pasillo"></td>
                                      <?php endif;?>
                                  <?php endfor;?>
                                  </tr>
                                <?php endfor;?>
                            </tbody>
                        </table>
                      </div>
                  </div>

                  
                  <div class="form-group row">
                    <div class="col-sm-12 text-right">
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