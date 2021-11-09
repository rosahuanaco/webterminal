<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Terminal de buses</title>
<base href="<?=base_url()?>" />
<link type="text/css" rel="stylesheet" href="statics/css/imprimir.css" />
<script type="text/javascript">
window.onload=function(){
	print();
	setTimeout("top.close()",0);
};
</script>
</head>
<body>
<?php switch($tipo):?>
<?php case 1:?>
	<div style="text-align: center;">
		<h1>Reporte de Ingresos</h1>
		<h3>Desde: <?=$fecha_inicio?> hasta <?=$fecha_fin?></h3>
		<?php $datos = array("ventas"=>$ventas,"reporte"=>true,"tipo"=>$tipo); $this->load->view('venta/reporte_detalle',$datos);?>
	</div>
<?php break; ?>
<?php case 2: ?>
	<div style="text-align: center;">
		<h1>Usuarios registrados en la Aplicación</h1>
		<h3>Desde: <?=$fecha_inicio?> hasta <?=$fecha_fin?></h3>
		<?php $datos = array("pasajeros"=>$pasajeros,"reporte"=>true,"tipo"=>$tipo); $this->load->view('venta/reporte_detalle',$datos);?>
	</div>	
<?php break; ?>
<?php case 3: ?>
	<div style="text-align: center;">
		<h1>Reporte de Pasajeros</h1>
		<h3>Fecha Viaje:<?=convertDateTimeRev($viaje->fecha_salida)?> Placa: <?=$viaje->placa?> Origen: <?=$viaje->origen?> Destino: <?=$viaje->destino?></h3>
		<?php $datos = array("pasajeros"=>$pasajeros,"reporte"=>true,"tipo"=>$tipo); $this->load->view('venta/reporte_detalle',$datos);?>
	</div>	
<?php break; ?>
<?php case 4: ?>
	<div style="text-align: center;">
		<h1>Reporte de Buses</h1>
		<h3>Desde: <?=$fecha_inicio?> hasta <?=$fecha_fin?></h3>
		<?php $datos = array("buses"=>$buses,"reporte"=>true,"tipo"=>$tipo); $this->load->view('venta/reporte_detalle',$datos);?>
	</div>	
<?php break; ?>
<?php default: ?>

<?php break; ?>
<?php endswitch; ?>
	
</body>
</html>