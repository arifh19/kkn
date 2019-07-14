<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/all.min.css') }}" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Sistem Manajemen Proker KKN') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- W3School 3.3.6 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/ionicons-2.0.1/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/ionicons-2.0.1/ionicons.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/select2/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/skins/_all-skins.min.css') }}">
    <link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{ url('home') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>SI</b>K</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SI</b>KKN</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @if (Auth::check())
                                    <!-- The user image in the navbar-->
                                    <img src="{{ asset('/img/member_avatar.png') }}" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">{!! auth()->user()->name !!}</span>
                                @else
                                    <!-- The user image in the navbar-->
                                    <img src="{{ asset('/img/default-50x50.gif') }}" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">User</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    @if (Auth::check())
                                        <img src="{{ asset('/img/member_avatar.png') }}" class="img-circle" alt="User Image">

                                        <p>
                                            {!! auth()->user()->name !!}
                                            <small>{!! auth()->user()->email !!}</small>
                                        </p>
                                    @else
                                        <img src="{{ asset('/img/default-50x50.gif') }}" class="img-circle" alt="User Image">

                                        <p>
                                            User
                                            <small>Email</small>
                                        </p>
                                    @endif
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    @if (Auth::check())
                                        <div class="pull-left">
                                            <a href="{{ url('/settings/profile/') }}" class="btn btn-default btn-flat">Profil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                                        </div>
                                    @else
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    @if (Auth::check())
                        <div class="pull-left image">
                            <img src="{{ asset('/img/member_avatar.png') }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{!! auth()->user()->name !!}</p>
                            <!-- Status -->
                            @if (auth()->user()->hasRole('admin'))
                                <a href="#">
                                    <i class="fa fa-circle text-success"></i>
                                    Admin
                                </a>
                            @elseif (auth()->user()->hasRole('mahasiswa'))
                                <a href="#">
                                    <i class="fa fa-circle text-success"></i>
                                    Mahasiswa
                                </a>
                            @elseif (auth()->user()->hasRole('dosen'))
                                <a href="#">
                                    <i class="fa fa-circle text-success"></i>
                                    Dosen
                                </a>
                            @elseif (auth()->user()->hasRole('staff'))
                                <a href="#">
                                    <i class="fa fa-circle text-success"></i>
                                    Staff
                                </a>
                            @endif
                        </div>
                    @else
                        <div class="pull-left image">
                            <img src="{{ asset('/img/default-50x50.gif') }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>User</p>
                            <!-- Status -->
                            <a href="#">
                                <i class="fa fa-circle text-success"></i>
                                Belum Terdaftar
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                        @if (Auth::check())
                            <!--
                            Hanya coba buat menu 'active' pakai Blade macro.
                            Tapi Lebih enak pakai Request::is()
                            -->
                            {!! Html::smartNav(url('home'), 'fa-dashboard', 'Dashboard') !!}

                            <!--
                            <li class="treeview {!! Request::is('home') ? 'active' : '' !!}">
                                <a href="{{ url('home') }}">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            -->

                            <!-- Optionally, you can add icons to the links -->

                            @role('admin')
                            <li class="treeview {!! Request::is('admin/config/*') ? 'active' : '' !!}">
                                <a href="{{ route('config.create') }}">
                                    <i class="fa fa-users"></i>
                                    <span>Profil KKN</span>
                                </a>
                            </li>
                            @endrole
                            <li class="treeview {!! Request::is('proker/*') ? 'active' : '' !!}">
                                <a href="{{ route('proker.index') }}">
                                    <i class="fa fa-book"></i>
                                    <span>Program Kerja</span>
                                </a>
                            </li>
                            <li class="treeview {!! Request::is('log/*') ? 'active' : '' !!}">
                                <a href="{{ route('log.index') }}">
                                    <i class="fa fa-edit"></i>
                                    <span>Log Proker</span>
                                </a>
                            </li>

                            <li class="treeview {!! Request::is('settings/*') ? 'active' : '' !!}">
                                <a href="#">
                                    <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="{!! Request::is('settings/profile*') ? 'active' : '' !!}">
                                        <a href="{{ url('/settings/profile/') }}">
                                            <i class="fa fa-user-o"></i> Profil
                                        </a>
                                    </li>
                                    <li class="{!! Request::is('settings/password') ? 'active' : '' !!}">
                                        <a href="{{ url('/settings/password') }}">
                                            <i class="fa fa-lock"></i> Ubah Password
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="treeview {!! Request::is('logout') ? 'active' : '' !!}">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Sign out</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @else
                            <li class="treeview">
                                <a href="{{ url('/register') }}">
                                    <i class="fa fa-sign-in"></i>
                                    <span>Daftar Baru</span>
                                </a>
                            </li>

                            <li class="treeview">
                                <a href="{{ url('/login') }}">
                                    <i class="fa fa-lock"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                        @endif

</ul>
<!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('dashboard')
        </h1>
        <ol class="breadcrumb">
            @yield('breadcrumb')
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        @include('layouts._flash')
        @yield('content')

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        KKN MIMPI POLMAN
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {!! date("Y") !!} <a href="http://arifh.web.id">        KKN MIMPI POLMAN    </a>.</strong> All rights reserved.
</footer>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('/admin-lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('/admin-lte/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/admin-lte/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/admin-lte/dist/js/app.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/admin-lte/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('/admin-lte/plugins/chartjs/Chart.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('/admin-lte/plugins/select2/select2.full.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('/js/custom.js') }}"></script>

<script>
$('.dataTable').DataTable({
                        responsive: true,
                        autoWidth: false
                    });
</script>

@yield('scripts')

</body>
</html>
