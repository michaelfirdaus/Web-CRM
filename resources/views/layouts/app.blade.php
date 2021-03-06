<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') | Michael's CRM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- Toastr Notification --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    
    {{-- Dropdown List W/Search --}}
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
      .dataTables_processing
      {
        z-index: 105 !important;
      }

      body{
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 13.5px;
      }

      b, strong, h1, h2, h3, h4, h5, .text-bold{
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
      }

      .navbar, aside, footer, .main-footer, .dropdown-menu{
        background-color: #1b1918 !important;
      }

      .dropdown-item{
        color: white !important;
      }

      .dropdown-item:hover{
        background-color: #c2c7d0d5 !important;

      }

      .active{
        background-color: red !important;
      }

    </style>
    
    @yield('css')
    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  @if(Auth::check())
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-black navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i><span>  Menu</span></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              Halo, {{ Auth::user()->name }}!
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a href="{{ route('user.profile') }}" class="dropdown-item">Profil Saya<a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('participants') }}" class="brand-link">
          <img src={{ asset('assets/company-logo.png') }} alt="Michael" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Michael's CRM</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('uploads/userphoto/'.Auth::user()->photo) }}" class="" alt="User Image">
            </div>
            <div class="info my-auto">
              <a href="#" class="d-block text-bold">{{ Auth::user()->name }}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                  
              <li class="nav-header">Data Utama</li>

              <li class="nav-item">
                <a href="/" class="nav-link @if(Request::segment(1) == 'participants') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard Peserta
                  </p>
                </a>
              </li>
              

              <li class="nav-item">
                <a href="{{route('transactions')}}" class="nav-link">
                  <i class="nav-icon fas fa-money-check"></i>
                  <p>
                    Transaksi
                  </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('jobconnectorparticipants')}}" class="nav-link">
                  <i class="nav-icon fas fa-briefcase"></i>
                  <p>
                    Job Connector
                  </p>
                </a>
              </li>

              
              <li class="nav-header">Data Kunci</li>
              

              <li class="nav-item">
                <a href="{{route('programs')}}" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Batch Program
                  </p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="{{route('coachprograms')}}" class="nav-link">
                  <i class="nav-icon fas fa-business-time"></i>
                  <p>
                    Jadwal Kelas
                  </p>
                </a>
              </li>
              
              
              <li class="nav-header">Data Pendukung</li>
              
              <li class="nav-item">
                <a href="{{route('branches')}}" class="nav-link">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                    Cabang/Lokasi Kelas
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('programcategories')}}" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Kategori Program
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('programnames')}}" class="nav-link">
                  <i class="nav-icon fas fa-book-open"></i>
                  <p>
                    Program
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('professions') }}" class="nav-link">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>
                    Profesi
                  </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('coaches')}}" class="nav-link">
                  <i class="nav-icon fas fa-chalkboard-teacher"></i>
                  <p>
                    Coach
                  </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('salespersons')}}" class="nav-link">
                  <i class="nav-icon fas fa-universal-access"></i>
                  <p>
                    Sales
                  </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('knows')}}" class="nav-link">
                  <i class="nav-icon fab fa-youtube"></i>
                  <p>
                    Kanal CRM
                  </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('jobconnectors')}}" class="nav-link">
                  <i class="nav-icon fas fa-city"></i>
                  <p>
                    Perusahaan Rekanan
                  </p>
                </a>
              </li>

              @if(Auth::user()->admin)

              <li class="nav-header">Administrasi Kantor</li>
              
              <li class="nav-item">
                <a href="{{route('reports')}}" class="nav-link">
                  <i class="nav-icon far fa-clipboard"></i>
                  <p>
                    Laporan Kelas
                  </p>
                </a>
              </li>

              <li class="nav-header">Fitur Admin</li>

              <li class="nav-item">
                <a href="{{route('users')}}" class="nav-link">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>
                    User
                  </p>
                </a>
              </li>

              @endif

              <li class="nav-header">Pengaturan</li>

              <li class="nav-item">
                <a href="{{route('user.profile')}}" class="nav-link">
                  <i class="nav-icon fas fa-user-circle"></i>
                  <p>
                    Profil Saya
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
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
            <div class="row mb-2 ml-2 justify-content-between">
              {{-- <div class="col-sm-12"> --}}
                <h4 class="m-0 text-black text-bold">@yield('header')</h4>
              {{-- </div><!-- /.col --> --}}
              {{-- <div class="col-sm-6 ml-auto"> --}}
                <ol class="breadcrumb mt-0 mr-2 form-inline text-sm">
                    @yield('breadcrumb')
                </ol>
              {{-- </div><!-- /.col --> --}}
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="wrapper">
                @yield('content')
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer bg-dark">
        <a href="https://www.linkedin.com/in/michaelfirdaus/" target="_blank" class="text-white" style="text-decoration: none !important;">  
          <strong>Copyright &copy; 2020-2021. Created By Michael.</strong>
          All rights reserved.
        </a>
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.1.7
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
  @endif

  @if(!Auth::check())
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/long-company-logo.png') }}" height=30px width=120px>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        {{-- <li class="nav-item">
                            <a class="nav-link text-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> --}}
                        <li class="nav-item">
                          <div class="text-bold">Michael's CRM</div>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>
  @endif

    

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
{{-- <script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script> --}}
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminLTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminLTE/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('adminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('adminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/dist/js/adminlte.js') }}"></script>
{{-- Toastr Notification --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

{{-- Dropdown List W/Search --}}
<script src="{{ asset('adminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
{{-- Additional JS --}}


<script>

    let url = window.location;

    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');

    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');


    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}")
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}")
    @endif
   
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })

    @yield('scripts')
</script>

</body>
</html>
