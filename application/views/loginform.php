<?php
$mensaje="";
switch ($msg){
    case '1':
      $mensaje="Error de ingreso";
      break;
    case '2':
    $mensaje="Acceso no valido";
    break;
    case '3':
     $mensaje="Gracias por usar el sistema";
    break;    
    default:
      $mensaje="Ingrese sus datos";
    break;

}
?>
<?php
defined('SYSDIR') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de compra de Boletos | Terminal Cochabamba</title> 
  
  <!-- Google Font: Source Sans Pro -->
 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?=base_url()?>adminlte/plugins/fontawesome-free/webfonts/fa-solid-900.ttf">
  <link rel="stylesheet" href="<?=base_url()?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="<?=base_url()?>adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Theme style -->


  <link rel="stylesheet" href="<?=base_url()?>adminlte/dist/css/adminlte.css">



  <link rel="stylesheet" href="<?=base_url()?>adminlte/dist/css/adminlte.min.css">  
  <link rel="stylesheet" href="<?=base_url()?>statics/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?=base_url()?>statics/css/bootstrap-datepicker.css.map">
  <link rel="stylesheet" href="<?=base_url()?>statics/css/style.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body class="hold-transition sidebar-mini" style="background-image:url('/webterminal/statics/img/fondo.jpg');">

<div class="login-box" style="margin: 100px auto;">  
  <!-- /.login-logo -->
  <div class="card">
    <div class="login-logo">
      <a href="../../index2.html"><b>SISTEMA DE PASAJES</b></a>
      <div class="img"></div>
    </div>
    <div class="card-body login-card-body" style="background-image: linear-gradient(#ffffff, #114A7F);">
      <p class="login-box-msg"><?php echo $mensaje; ?></p>    
        <?php
        echo form_open_multipart('login/validarusuario');
        ?>
        <div class="input-group mb-3">
          <input type="text" name="login" class="form-control" placeholder="Correo" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember" style="color:#ffffff;">
                Recuérdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar </button>
          
          </div>
          <!-- /.col -->
        </div>
   
        <?php
        echo form_close();
        ?>

      <p class="mb-1">
        <a href="forgot-password.html">Olvide mi contraceña</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>statics/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>statics/js/bootstrap.js"></script>
<script src="<?=base_url()?>statics/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="<?=base_url()?>statics/js/util.js"></script>
</body>
</html>