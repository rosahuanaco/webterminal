<?php if(is_object($venta)):?>
<form id="frmVenta" action="<?=site_url('venta/guardar')?>">
    <input type="hidden" name="id" value="<?=$venta->id?>">
    <div class="form-group row">
        <label for="nit_ci" class="col-sm-2 col-form-label">Nit o CI</label>
        <div class="col-sm-10">
            <input name="nit_ci" value="<?=$venta->nit_ci?>" type="text" class="form-control" placeholder="Nit o CI" id="nit_ci" required>                      
        </div>
    </div>

    <div class="form-group row">
        <label for="razon_social" class="col-sm-2 col-form-label">Razon social o Nombre</label>
        <div class="col-sm-10">
            <input name="razon_social" value="<?=$venta->nombre?>" type="text" class="form-control" placeholder="Razon social o Nombre" id="razon_social" required>
        </div>
    </div>

    <?php if(is_array($detalles) && count($detalles)>0):?>
        <?php $total = 0; ?>
        <table id="reservas" class="table table-bordered table-striped">
            <thead>
                <tr class="sub">                    
                    <th>Nombre Completo</th>
                    <th>Ci</th>
                    <th>Nro. Asiento</th>
                    <th>Precio</th>                   
                </tr>
            </thead>
            <tbody class="texto">
                <?php foreach($detalles as $detalle):?>
                    <?php $total += $detalle->precio; ?>
                    <tr>
                        <td><?=$detalle->nombre." ".$detalle->apellido_paterno." ".$detalle->apellido_materno?></td>
                        <td><?=$detalle->ci?></td>
                        <td><?=$detalle->numero?></td>                        
                        <td><?=$detalle->precio?></td>                        
                    </tr>
                <?php endforeach;?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total:</td>                        
                        <td><?=$total?></td>                        
                    </tr>
            </tbody>
    <?php endif;?>
</form>
<?php else:?>
    <p>No se encontraron resultados para la consulta</p>
<?php endif;?>
