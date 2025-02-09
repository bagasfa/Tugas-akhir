<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/ico" href="{{ asset('assets/img/favicon.ico') }}"/>

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.css') }}">
    <link href="{{ asset('assets/sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/stisla-custom.css') }}">
    @stack('stylesheet')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fab fa-stripe-s"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sapi <sup>2</sup> ku</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Dashboard -->
            <li id="dashboard" class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            @if(auth()->user()->id_role == 1)
            <!-- Log History -->
            <li id="history" class="nav-item">
                <a class="nav-link" href="{{ url('history') }}">
                    <i class="fas fa-fw fa-history"></i>
                    <span>Log History</span></a>
            </li>

            <!-- Pengurus -->
            <li id="pengurus" class="nav-item">
                <a class="nav-link" href="{{ url('pengurus') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengurus</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Sapi
            </div>

            <!-- Data Sapi -->
            <li id="sapi" class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataSapi"
                    aria-expanded="true" aria-controls="dataSapi">
                    <i class="fas fa-fw fa-server"></i>
                    <span>Data Sapi</span>
                </a>
                <div id="dataSapi" class="collapse" aria-labelledby="dataSapi" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Sapi :</h6>
                        <a class="collapse-item" href="{{ url('daftar-sapi') }}">
                            <i class="fas fa-fw fa-clipboard-list"></i> Daftar Sapi
                        </a>
                        <a class="collapse-item" href="{{ url('sapi-keluar') }}">
                            <i class="fas fa-fw fa-sign-out-alt"></i> Sapi Keluar
                        </a>
                    </div>
                </div>
            </li>

            <!-- Hasil Perah -->
            <li id="hasilPerah" class="nav-item">
                <a class="nav-link" href="{{ url('hasil-perah') }}">
                    <i class="fas fa-fw fa-hand-holding-water"></i>
                    <span>Hasil Perah</span></a>
            </li>

            @if(auth()->user()->id_role == 1)
            <!-- Pengeluaran -->
            <li id="pengeluaran" class="nav-item">
                <a class="nav-link" href="{{ url('pengeluaran') }}">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Pengeluaran</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="d-none d-md-inline ml-3">
                <button class="rounded border-0" id="sidebarToggle"></button>
            </div>
           
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                  
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                                            
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                                @if(auth()->user()->avatar == !NULL)
                                <img class="img-profile rounded-circle"
                                    src="assets/img/avatar/{{auth()->user()->avatar}}">
                                @else
                                <img class="img-profile rounded-circle"
                                    src="assets/img/avatar-stock.jpg">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ url('password') }}">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Update Password
                                </a>
                                <a class="dropdown-item" href="{{ url('activity') }}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Activity
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @include('sweetalert::alert')
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sapiku 2021</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan Tombol "Logout" dibawah untuk keluar dari sesi anda.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="{{ url('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/sb-admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/datatables.js')}}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/sb-admin/js/sb-admin-2.min.js') }}"></script>
    @stack('javascript')
</body>
</html>