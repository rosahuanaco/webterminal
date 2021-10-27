<?php if(is_array($ventas) && count($ventas)>0):?>
  <?php $total=0; ?>
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
      <th>Fecha</th>
      <th>Total</th>
    </tr>
    </thead>
    <tbody class="texto">
      <?php foreach($ventas as $venta):?> 
        <tr>          
          <td><?=$venta->id?></td>   
          <td><?=$venta->pasajero?></td>
          <td><?=$venta->nombre?></td>
          <td><?=$venta->nit_ci?></td>
          <td><?=$venta->viaje?></td>
          <td><?=convertDateTimeRev($venta->fecha)?></td>
          <td><?=$venta->total?></td>
        </tr>
        <?php $total += $venta->total; ?>        
      <?php endforeach;?>  
      <tr>          
          <td></td>   
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>Total:</td>
          <td><?=$total?></td>
        </tr>              
    </tbody>
    <tfoot>
    <tr class="sub">
      <th>Id</th>
      <th>Pasajero</th>
      <th>Razon social | Nombre</th>
      <th>Nit | Ci</th>
      <th>Origen-Destino</th>
      <th>Fecha</th>
      <th>Total</th>
    </tr>
    </tfoot>
  </table>
</div>
<?php else: ?>
  <div class="card-body" style="min-height:600px;">No existe Ventas.</div>
<?php endif; ?>