  <!-- Navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="<?=base_url()?>adminlte/index3.html" class="brand-link">
      <img src="<?=base_url()?>statics/img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SISTEMA DE PASAJES</span>      
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('usuario/')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Usuarios</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('usuario/crear')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear  Usuarios</p>
                </a>
              </li>
            </ul>
          </li> 

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Publicaciones de Viajes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('viaje')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Publicaciones de Viajes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('viaje/crear')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear nuevo Viaje</p>
                </a>
              </li>
            </ul>            
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Chofer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('chofer')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de chofer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('chofer/crear')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear nuevo Chofer</p>
                </a>
              </li>
            </ul>            
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Buses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('bus')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Buses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('bus/crear')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear nuevo Bus</p>
                </a>
              </li>
            </ul>
          </li> 

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>