<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('TitleBar')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('startbootstrap/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('startbootstrap/css/sb-admin-2.min.css')}}" rel="stylesheet">

    @yield('DynamicCSS')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
    <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        @can('Create Masjid Report')
        <!-- Heading -->
        <div class="sidebar-heading">
           Data Masjid
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        @can('Soft Delete Masjid Report')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kas" aria-expanded="true" aria-controls="kas">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Kas</span>
            </a>
            <div id="kas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="{{route ('kas-penerimaan.index')}}">Penerimaan</a>
                  <a class="collapse-item" href="{{route ('kas-pengeluaran.index')}}">Pengeluaran</a>
              </div>
            </div>
        </li>
        @endcan

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Zis</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('zis.index')}}">Data Zis</a>
                <a class="collapse-item" href="{{route('zis.create')}}">Tambah Data Zis</a>
                <a class="collapse-item" href="{{route('zisArchive')}}">Arsip Zis</a>
            </div>
            </div>
        </li>

      <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Qurban</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route ('qurban.index')}}">Qurban Tahun Ini</a>
                <a class="collapse-item" href="{{route ('qurban.create')}}">Tambah Hewan</a>
            </div>
            </div>
        </li>

        <li class="nav-item">
          <a href="{{route('alamat-jamaah.index')}}" class="nav-link collapsed">
            <i class="fas fa-users"></i>
            <span>Jamaah</span>
          </a>
        </li>
        @endcan
        <!-- Heading -->
        @can('Content')
        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Humas</div>
        <!--link for admin-->

          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="true" aria-controls="blog">
              <i class="fas fa-fw fa-file"></i>
              <span>Blog</span>
              </a>
              <div id="blog" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route ('blog.index')}}">Blog</a>
                    <a class="collapse-item" href="{{route ('blog.create')}}">Buat Berita</a>
                </div>
              </div>
          </li>
          <li class="nav-item">
          <a href="{{route('pengumuman.create')}}" class="nav-link collapsed">
            <i class="fas fa-exclamation-triangle"></i>
            <span>Buat Pengumuman</span>
          </a>
        </li>
        @endcan

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        @can('Administer roles & permissions')
        <div class="sidebar-heading">Admin</div>
        <!--link for admin-->
        
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="kas">
              <i class="fas fa-fw fa-user"></i>
              <span>Users</span>
              </a>
              <div id="users" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route ('users.index')}}">Users</a>
                    <a class="collapse-item" href="{{route ('roles.index')}}">Roles</a>
                    <a class="collapse-item" href="{{route ('permissions.index')}}">Permissions</a>
                </div>
              </div>
          </li>
        @endcan
        

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layouts.startbstrpnavbar')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                @yield('TitleBox')
                

                <!-- Content Row -->
                @yield('Content')
            

            </div>
            <!-- /end of .container-fluid -->

         </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2019</span>
            </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin telah menyelesaikan tugas anda dan ingin keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik Logout untuk keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
          </form>

        </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('startbootstrap/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('startbootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('startbootstrap/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('startbootstrap/js/sb-admin-2.min.js')}}"></script>

    <!--Dynamic Script-->
    @yield('DynamicScript')


</body>

</html>
