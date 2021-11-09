<?php switch ($tipo): ?>
<?php case 1: ?>
  <?php if(is_array($ventas) && count($ventas)>0):?>
  <!-- /.card-header -->
  <div class="card-body" style="min-height:600px;">
    <table id="reservas" class="table table-bordered table-striped">
      <thead>
      <tr class="sub">
        <th>Id</th>
        <th>Pasajero</th>
        <th>Razon social | Nombre</th>
        <th>Nit | Ci</th>
        <th>Origen-Destino</th>
        <th>Bus</th>
        <th>Fecha Reserva</th>
        <th>Total</th>
      </tr>
      </thead>
      <tbody class="texto">
        <?php $total=0; foreach($ventas as $venta):?> 
          <tr>          
            <td><?=$venta->id?></td>   
            <td><?=$venta->nombre." ".$venta->apellido_paterno." ".$venta->apellido_materno?></td>
            <td><?=$venta->razon_social?></td>
            <td><?=$venta->nit_ci?></td>
            <td><?=$venta->viaje?></td>
            <td><?=$venta->placa?></td>
            <td><?=convertDateTimeRev($venta->fecha)?></td>
            <td><?=$venta->total?></td>
          </tr>        
        <?php $total +=$venta->total;  endforeach;?>  
          <tr>          
            <td></td>   
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total:</td>
            <td><?=$total?></td>
          </tr>              
      </tbody>
      <?php if(!isset($reporte)):?>
      <tfoot>
      <tr class="sub">
        <th>Id</th>
        <th>Pasajero</th>
        <th>Razon social | Nombre</th>
        <th>Nit | Ci</th>
        <th>Origen-Destino</th>
        <th>Bus</th>
        <th>Fecha Reserva</th>
        <th>Total</th>
      </tr>
      </tfoot>
      <?php endif;?>
    </table>
  </div>
  <?php else: ?>
    <div class="card-body" style="min-height:600px;">No existe Ventas.</div>
  <?php endif; ?>
<?php break; ?>

<?php case 2: ?>
  <?php if(is_array($pasajeros) && count($pasajeros)>0):?>
  <!-- /.card-header -->
  <div class="card-body" style="min-height:600px;">
    <table id="reservas" class="table table-bordered table-striped">
      <thead>
      <tr class="sub">
        <th>Id</th>
        <th>Nombre Completo</th>
        <th>Ci</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Dirección</th>
        <th>fecha</th>
        <th>Frecuencia Compra</th>
        <th>Frecuencia Reserva</th>
      </tr>
      </thead>
      <tbody class="texto">
        <?php $total=0; foreach($pasajeros as $pasajero):?> 
          <tr>          
            <td><?=$pasajero->id?></td>   
            <td><?=$pasajero->nombre." ".$pasajero->apellido_paterno." ".$pasajero->apellido_materno?></td>
            <td><?=$pasajero->ci?></td>
            <td><?=$pasajero->email?></td>
            <td><?=$pasajero->telefono?></td>
            <td><?=$pasajero->direcciones?></td>
            <td><?=convertDateTimeRev($pasajero->fecha)?></td>
            <td><?=$pasajero->frecuencia?></td>
            <td><?=$pasajero->frecuenciar?></td>
          </tr>        
        <?php $total += 1;  endforeach;?>  
          <tr>          
            <td></td>   
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Usuarios registrados:</td>
            <td><?=$total?></td>
          </tr>              
      </tbody>
      <?php if(!isset($reporte)):?>
      <tfoot>
      <tr class="sub">
        <th>Id</th>
        <th>Nombre Completo</th>
        <th>Ci</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Dirección</th>
        <th>fecha</th>
        <th>Frecuencia Compra</th>
        <th>Frecuencia Reserva</th>
      </tr>
      </tfoot>
      <?php endif;?>
    </table>
  </div>
  <?php else: ?>
    <div class="card-body" style="min-height:600px;">No existe Usuarios registrados en la APP.</div>
  <?php endif; ?>
  <?php break; ?>

  <?php case 3: ?>
  <?php if(is_array($pasajeros) && count($pasajeros)>0):?>
  <!-- /.card-header -->
  <div class="card-body" style="min-height:600px;">
    <table id="reservas" class="table table-bordered table-striped">
      <thead>
      <tr class="sub">
        <th> Nro.Asiento </th>
        <th> Nombre Completo </th>
        <th> Ci </th>
        <th> Sexo </th>
        <th> Precio </th>
      </tr>
      </thead>
      <tbody class="texto">
        <?php foreach($pasajeros as $pasajero):?> 
          <tr>          
            <td><?=$pasajero->asiento?></td>   
            <td><?=$pasajero->nombre." ".$pasajero->apellido_paterno." ".$pasajero->apellido_materno?></td>
            <td><?=$pasajero->ci?></td>
            <td><?=$pasajero->sexo=='F'?'Femenino':'Maculino'?></td>
            <td><?=$pasajero->precio?></td>
          </tr>        
        <?php endforeach;?>              
      </tbody>
      <?php if(!isset($reporte)):?>
      <tfoot>
      <tr class="sub">
        <th>Nro.Asiento</th>
        <th>Nombre Completo</th>
        <th>Ci</th>
        <th>Sexo</th>
        <th>Precio</th>
      </tr>
      </tfoot>
      <?php endif;?>
    </table>
  </div>
  <?php else: ?>
    <div class="card-body" style="min-height:600px;">No existe Pasajeros.</div>
  <?php endif; ?>
  <?php break; ?>

  <?php case 4: ?>
  <?php if(is_array($buses) && count($buses)>0):?>
  <!-- /.card-header -->
  <div class="card-body" style="min-height:600px;">
    <table id="reservas" class="table table-bordered table-striped">
      <thead>
      <tr class="sub">
        <th> Placa </th>
        <th> Chofer </th>
        <th> Origen </th>
        <th> Destino </th>
        <th> Cantidad Viajes </th>
      </tr>
      </thead>
      <tbody class="texto">
        <?php foreach($buses as $bus):?> 
          <tr>          
            <td><?=$bus->placa?></td>   
            <td><?=$bus->nombres." ".$bus->apellido_paterno." ".$bus->apellido_materno?></td>
            <td><?=$bus->origen?></td>
            <td><?=$bus->destino?></td>
            <td><?=$bus->cantidad?></td>
          </tr>        
        <?php endforeach;?>              
      </tbody>
      <?php if(!isset($reporte)):?>
      <tfoot>
        <tr class="sub">
          <th> Placa </th>
          <th> Chofer </th>
          <th> Origen </th>
          <th> Destino </th>
          <th> Cantidad Viajes </th>
        </tr>
      </tfoot>
      <?php endif;?>
    </table>
  </div>
  <?php else: ?>
    <div class="card-body" style="min-height:600px;">No existe Pasajeros.</div>
  <?php endif; ?>
  <?php break; ?>

<?php endswitch; ?>