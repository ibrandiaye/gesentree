<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Direction générale des Élections (DGE) </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Direction générale des Élections (DGE)" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('logo/fav.ico') }}">

     <!-- Table datatable css -->
     <link href=" {{ asset('assets/libs/datatables/dataTables.bootstrap4.min.css') }} " rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/libs/datatables/fixedHeader.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/libs/datatables/scroller.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/libs/datatables/dataTables.colVis.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('assets/libs/datatables/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href=" {{ asset('assets/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    @yield('css')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        @php
            $user = Auth::user();
        @endphp
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">



                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                        <span class="d-none d-sm-inline-block ml-1">{{$user->name ?? " "}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenue !</h6>
                        </div>
{{--
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-outline"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-lock-outline"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div> --}}

                        <!-- item-->

                        <a class="dropdown-item notify-item"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Deconnexion</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>
{{--
                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                        <i class="mdi mdi-settings noti-icon"></i>
                    </a>
                </li> --}}

            </ul>

            <!-- LOGO -->
            <div class="logo-box" style="background-color: white;">
                <a href="index.html" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo.png') }}" alt="" height="80">
                        <!-- <span class="logo-lg-text-light">Zircos</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">Z</span> -->
                        <img src="{{ asset('logo/logo.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="{{ route('home') }}" class="waves-effect waves-light">
                                    <i class="mdi mdi-gauge"></i>
                                    <span> Tableau de bords </span>
                                </a>

                            </li>
                            @if ($user->role=="admin")
                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-google-pages"></i>
                                    <span> Site </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('site.create') }}">Ajouter Site</a></li>
                                    <li><a href="{{ route('site.index') }}">Liste des Site</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-google-pages"></i>
                                    <span> Service </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('service.create') }}">Ajouter Service</a></li>
                                    <li><a href="{{ route('service.index') }}">Liste des Service</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-account"></i>
                                    <span> Employe </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('employe.create') }}">Ajouter Employe</a></li>
                                    <li><a href="{{ route('employe.index') }}">Liste des Employe</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-account"></i>
                                    <span> Utilisateur </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('user.create') }}">Ajouter Utilisateur</a></li>
                                    <li><a href="{{ route('user.index') }}">Liste des Utilisateur</a></li>
                                </ul>
                            </li>
                              <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-google-pages"></i>
                                    <span> Rechercher </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('rechercher.create') }}">Ajouter Rechercher</a></li>
                                    <li><a href="{{ route('rechercher.index') }}">Liste des Rechercher</a></li>
                                </ul>
                            </li>
                            @endif
                            @if ($user->role=="admin" ||  ($user->role=="utilisateur"))

                            <li>
                                <a href="javascript: void(0);" class="waves-effect waves-light">
                                    <i class="mdi mdi-account"></i>
                                    <span> Entree </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route(name: 'entree.create') }}">Ajouter Entrée</a></li>
                                    <li><a href="{{ route('entree.index') }}">Liste des Entrées</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                {{--     <div class="help-box">
                        <h5 class="text-muted mt-0">For Help ?</h5>
                        <p class=""><span class="text-info">Email:</span>
                            <br/> support@support.com</p>
                        <p class="mb-0"><span class="text-info">Call:</span>
                            <br/> (+123) 123 456 789</p>
                    </div>
 --}}
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('content')
                    <!-- start page title -->


                    <!-- end page title -->

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2025 &copy; <a href="">MINT </a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
        </div>
        <div class="slimscroll-menu">

            <div class="p-4">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, layout, etc.
                </div>
                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/light.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                    <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/dark.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css"
                        data-appStyle="{{ asset('assets/css/app-dark.min.css') }}" />
                    <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/rtl.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="{{ asset('assets/css/app-rtl.min.css') }}" />
                    <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/images/layouts/dark-rtl.png') }}" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-5">
                    <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="{{ asset('assets/css/bootstrap-dark.min.css') }}"
                        data-appStyle=" {{ asset('assets/css/app-dark-rtl.min.css') }} " />
                    <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                </div>

                <a href="https://1.envato.market/eKY0g" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
            </div>
        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

   {{--  <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
        <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
    </a>
 --}}
    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script>
         function convertDateFormat(dateString) {
    // Séparer la date par le caractère "/"
    const parts = dateString.split('/');

    // Vérifier que la date est au bon format
    if (parts.length !== 3) {
        throw new Error("Format de date invalide. Utilisez 'dd/MM/yyyy'.");
    }

    // Réorganiser les parties de la date
    const day = parts[0];
    const month = parts[1];
    const year = parts[2];

    // Retourner la date au format 'yyyy-MM-dd'
    return `${year}-${month}-${day}`;
}

    </script>


       <!-- Datatable plugin js -->
       <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

       <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

       <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>

       <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>

       <script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables/dataTables.fixedHeader.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables/dataTables.scroller.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables/dataTables.fixedColumns.min.js') }}"></script>

       <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
       <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
       <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>

       <!-- Datatables init -->
       <script src="{{ asset('assets/js/pages/datatables.init.js') }} "></script>
       <script src="{{asset('assets/js/jquery.blockUI.js') }}"></script>


    @yield('js')

</body>

</html>
