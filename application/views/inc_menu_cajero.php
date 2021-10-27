  <!-- Navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#114A7F;">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>adminlte/index3.html" class="brand-link">
      <img src="<?=base_url()?>statics/img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="titulo">SISTEMA DE PASAJES</span>      
    </a>

        <?php
        echo form_open_multipart('login/logout');
        ?>
        <button type="submit" class="btn btn-primary btn-block">Cerrar sesión</button>
        <?php
        echo form_close();
        ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->session->userdata('nombre')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="material-icons">filter_hdr</i>
              <p class="sub">
                Reservas
              </p>
            </a>
          </li>                   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>