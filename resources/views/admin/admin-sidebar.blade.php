<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin-template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="/admin-template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/admin-template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/admin-template/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin-template/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/admin-template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin-template/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/admin-template/plugins/summernote/summernote-bs4.min.css">
</head>

<body>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin-template/index3.html" class="brand-link">
            
            <span class="brand-text font-weight-light"></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/admin-template/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               @if (Auth::user()->role == "admin" || Auth::user()->role == "supervisor")
                   
                    <li class="nav-item">
                        <a href="/admin" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                        {{-- <li class="nav-item">
            <a href="admin-datakaryawan" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Karyawan
              </p>
            </a>
          </li> --}}

                    <li class="nav-item">
                        <a href="/admin-absensi" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Absensi Karyawan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                KPI Karyawan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach ($departemenList as $departemen)
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $departemen->nama }}</p>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @foreach ($departemen->divisi as $divisi)
                                            <li class="nav-item">
                                                <a href="{{ route('admin-showdivisi.show', ['departemen' => $departemen->id, 'divisi' => $divisi->id]) }}" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>{{ $divisi->nama }}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
               @endif

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                SPK TOPSIS
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (Auth::user()->role === "kp_divisi" || Auth::user()->role === "admin" || Auth::user()->role === "supervisor")
                                
                                <li class="nav-item">
                                    <a href="/admin-penilaian" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penilaian KPI Karyawan</p>
                                    </a>
                                </li>

                            @endif

                            @if (Auth::user()->role === "admin_accounting" || Auth::user()->role === "admin" || Auth::user()->role === "supervisor")

                                <li class="nav-item">
                                    <a href="/admin-hasilspk" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SPK Bonus Karyawan</p>
                                    </a>
                                </li>

                            @endif

                        </ul>
                    </li>
                    @if (Auth::user()->role == "admin" || Auth::user()->role == "supervisor")
                    <li class="nav-item">
                        <a href="/admin-datauser" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Data User
                            </p>
                        </a>
                    </li>
                    @endif

                    {{-- <li class="nav-item">
                        <form action="/logout" class="text-start" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="nav-link btn w-100 text-start" style="background: none; border: none; padding-left: 0;">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p class="d-inline">Logout</p>
                            </button>
                        </form>
                    </li> --}}



                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>



    <!-- Skrip lainnya -->
    <script src="/admin-template/plugins/jquery/jquery.min.js"></script>
    <script src="/admin-template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin-template/dist/js/adminlte.min.js"></script>
    <script src="/admin-template/dist/js/demo.js"></script>
</body>

</html>
