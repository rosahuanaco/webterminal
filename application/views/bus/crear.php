<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="background-image:url('/webterminal/statics/img/fondo.jpg');">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="titulo">BUSES</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Buses</a></li>
              <li class="breadcrumb-item active">Crear</li>
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
                <h3 class="sub">Formulario de Nuevo Bus</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="color:red;" id="mensaje"></div>
                <form id="frmbus" action="<?=site_url('bus/guardar')?>">
                  <input type="hidden" name="id" value="">
                  <div class="form-group row">
                    <label for="placa" class="col-sm-2 col-form-label">Placa de Bus</label>
                    <div class="col-sm-10">
                      <input name="placa" type="text" class="form-control" placeholder="Placa" id="placa" required>                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="tipo" name="tipo">
                            <option value="Semi cama">Semi cama</option>
                            <option value="Cama">Cama</option>
                            <option value="Leito">Leito</option>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-group row">
                    <label for="comodidad" class="col-sm-2 col-form-label">Comodidad</label>
                    <div class="col-sm-10">
                      <input name="comodidad" type="text" class="form-control" placeholder="Caracteristicas especiales" id="comodidad" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-2">
                                          
                    </div>
                    <div class="col-sm-10">                       
                        <h3 class="texto">Para eliminar asientos solamente debe dar doble clik en la misma.</h3>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-0">
                                          
                    </div>
                    <div class="col-sm-3">
                    <h5 for="filas" class="sub">Datos asiento</h5>
                      <label for="pisos">Cantidad pisos</label>
                      <select class="form-control" id="pisos" name="pisos">
                              <option value="1">1</option>
                              <option value="2">2</option>
                        </select>
                        <br>                        
                        <table class="table table-responsive">
                              <tbody>
                                  <tr>
                                      <td><label for="filas">Filas Planta Baja</label></td>
                                      <td><input name="filas" type="number" class="form-control" placeholder="Filas" id="filas" min="0" data-bind="value:filas" required></td>
                                  </tr>
                                  <tr id="inputPiso2" style="visibility: collapse;">
                                      <td><label for="filas2">Filas Planta alta</label></td>
                                      <td><input name="filas2" type="number" class="form-control" placeholder="Filas" id="filas2" min="0" data-bind="value:filas"></td>
                                  </tr>
                                  <tr>
                                      <td><label for="columnas">Columnas</label></td>
                                      <td>
                                          <select class="form-control" id="columnas" name="columnas">
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                          </select>
                                      </td>
                                  </tr>
                              </tbody>
                        </table>                      
                        
                                                                                            
                        <div class="form-group row">
                          <button id="btnGenerar" class="btn btn-primary">Generar Asiento</button>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <table class="table table-responsive" id="piso1">
                            <thead>
                                <tr>
                                    <th colspan="3">Planta Baja</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                      </div>
                      <div class="col-sm-4">
                        <table class="table table-responsive" id="piso2">
                            <thead>
                                <tr>
                                    <th colspan="3">Planta alta</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                      </div>
                  </div>

                  
                  <div class="form-group row">
                    <div class="col-sm-12 text-right">
                      <button type="submit" class="btn btn-primary">Registrar nuevo</button>
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