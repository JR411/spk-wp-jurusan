<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Rekomendasi Jurusan Perguruan Tinggi - @yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="/images/logo/logo_icon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="/css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="/css/color_2.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="/css/perfect-scrollbar.css" />
    <link href="/css/select2.min.css" rel="stylesheet" media="all">
    <link href="/css/datatables.min.css" rel="stylesheet" media="all">
    <!-- custom css -->
    <link rel="stylesheet" href="/css/custom.css" />
</head>
<body class="dashboard dashboard_2">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="/dashboard"><img class="logo_icon img-responsive" src="/images/logo/logo_icon.png" alt="#" /></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4>Dashboard</h4>
                    <ul class="list-unstyled components">
                        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                            <a href="/dashboard"><i class="fa fa-home blue1_color"></i> <span>Home</span></a></li>
                        <li class="{{ Request::is('dashboard/jurusan*') ? 'active' : '' }}">
                            <a href="/dashboard/jurusan"><i class="fa fa-institution grey_color"></i> <span>Jurusan</span></a></li>
                        <li class="{{ Request::is('dashboard/kriteria*') && !$kriterias->contains(fn($item) => Request::is('dashboard/kriteria/'.$item->slug)) ? 'active' : '' }}">
                            <a href="/dashboard/kriteria"><i class="fa fa-file"></i> <span>Kriteria</span></a></li>
                        <li class="{{ $kriterias->contains(fn($item) => Request::is('dashboard/kriteria/'.$item->slug)) ? 'active' : '' }}">
                            <a href="#ul-sub" data-toggle="collapse" class="dropdown-toggle"
                                aria-expanded="{{ $kriterias->contains(fn($item) => Request::is('dashboard/kriteria/'.$item->slug)) ? 'true' : 'false' }}">
                                <i class="fa fa-archive brown_color"></i> <span>Sub Kriteria</span></a>
                            <ul class="collapse list-unstyled {{ $kriterias->contains(fn($item) => Request::is('dashboard/kriteria/'.$item->slug)) ? 'show' : '' }}" id="ul-sub">
                                @foreach ($kriterias as $item)
                                    <li class="{{ Request::is('dashboard/kriteria/'.$item->slug) ? 'active' : '' }}">
                                        <a href="/dashboard/kriteria/{{ $item->slug }}">> <span>{{ $item->kriteria_nama }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="{{ Request::is('dashboard/calon-mahasiswa*') ? 'active' : '' }}">
                            <a href="/dashboard/calon-mahasiswa"><i class="fa fa-book green_color"></i> <span>Calon Mahasiswa</span></a></li>
                        <li class="{{ Request::is('dashboard/hasil-perhitungan*') ? 'active' : '' }}">
                            <a href="/dashboard/hasil-perhitungan"><i class="fa fa-calculator purple_color2"></i> <span>Hasil Perhitungan</span></a></li>
                        <li>
                            <form action="/keluar" method="post" id="keluarForm">
                                @csrf
                                <a href="#" class="" onclick="document.getElementById('keluarForm').submit();">
                                    <i class="fa fa-sign-out red_color"></i> <span>Keluar</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                            <div class="page_title">
                                <h2>@yield('title')</h2>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <!-- content -->
                    @yield('content')
                    <!-- end content -->
                    <!-- footer -->
                    <div class="container-fluid">
                        <div class="footer">
                            <p>Copyright © 2024 SPK Rekomendasi Jurusan Perguruan Tinggi. All rights reserved.</p>
                        </div>
                    </div>
                </div>
                <!-- end dashboard inner -->
            </div>
            <!-- end right content -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="/js/animate.js"></script>
    <!-- select country -->
    <script src="/js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="/js/owl.carousel.js"></script>
    <!-- chart js -->
    <script src="/js/Chart.min.js"></script>
    <script src="/js/Chart.bundle.min.js"></script>
    <script src="/js/utils.js"></script>
    <script src="/js/analyser.js"></script>
    <!-- nice scrollbar -->
    <script src="/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/datatables.min.js"></script>
    <!-- custom js -->
    <script src="/js/custom.js"></script>
    <script src="/js/chart_custom_style2.js"></script>
    @yield('js')
</body>
</html>
