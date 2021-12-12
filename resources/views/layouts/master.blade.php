
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>School</title>
  
  
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  {{-- datatables --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.css') }}">    
  <link rel="stylesheet" type="text/css" href="{{ asset('css/buttons.dataTables.min.css') }}">            
  <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable_customize.css') }}" rel="stylesheet">
  {{-- datatables --}}
  

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>       
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('Beshoy.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Page</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">        
        <div class="info">
          <a href="#" class="d-block">
            {{ Auth::user()->name }}
          </a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Starter Pages
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/dashboard" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Dashboard</p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/settings" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Settings</p>
                    </router-link>
                </li>
                </ul>
            </li>

            <li class="nav-item menu">
                <a href="#" class="nav-link">
                    <i class="fas fa-list-ul nav-icon"></i>
                <p>
                    Manage Menu
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">                
                <li class="nav-item">
                    <a href="#" class="nav-link">                        
                        <i class="fas fa-eye nav-icon"></i>
                        <p>View</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item menu">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                <p>
                    Manage Admins
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/add_admin" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Add</p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/view_admin" class="nav-link">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>View</p>
                    </router-link>
                </li>
                </ul>
            </li>
            <li class="nav-item menu">
                <a href="#" class="nav-link">                    
                    <i class="nav-icon fas fa-user-tie"></i>
                <p>
                    Manage Teachers
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/add_teacher" class="nav-link add_teacher">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Add</p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/view_teacher" class="nav-link">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>View</p>
                    </router-link>
                </li>
                </ul>
            </li>
            <li class="nav-item menu">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                    Manage Students
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Add</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>View</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item menu">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-newspaper"></i>
                <p>
                    Manage Courses
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Add</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-eye nav-icon"></i>
                        <p>View</p>
                    </a>
                </li>
                </ul>
            </li>

            

            <li class="nav-item">
              <router-link to="/home" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Test</p>
            </router-link>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>     
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>       
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <router-view></router-view>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->   

    <div class="content">

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


{{-- datatables --}}
<script type="text/javascript" charset="utf8" src="{{ asset('js/dataTables/jszip.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('js/dataTables/pdfmake.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('js/dataTables/vfs_fonts.js') }}"></script>
{{-- datatables --}}

<script src="{{ asset('js/app.js') }}"></script>


<script>

  var show = $('.sidebar').find('.router-link-exact-active');
  show.parent().parent().parent().addClass('menu-is-opening');
  show.parent().parent().parent().addClass('menu-open');  

</script>

</body>
</html>
