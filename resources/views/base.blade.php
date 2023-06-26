<!DOCTYPE html>
<html lang="en" style="min-height:100%;background-color:#f4f4f4">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator - @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    </head>
    <body style="background-color:#f4f4f4">
        <div class="top-bar">
            <img src="{{ asset('img/mobile-pay1.png') }}" class="img-bar">
            <a href="#" class="brands">LRTOKO</a>
            <div class="btn-burger burger dib pointer"><i class="fas fa-bars"></i></div>
            <div class="navbar-img navbar-right">
                <div class="user-bar drop-bar">
                    <img src="{{ asset('img/default.png') }}" class="user-bar-img">
                    <span class="user-bar-name" style="color:#fff">{{ Session::get('admin_nama') }}</span>
                    <span class="dropdown-i"><i class="fa fa-chevron-right fa-fw"></i></span>
                </div>
            </div>

            <div class="clear"></div>
        </div>
        <div class="dropmenu">
                <ul class="list-unstyled" style="margin-top: 10px">
                    <li><a href="{{ url('admin/edit_user/'.Session::get('admin')) }}"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;Profil</a></li>
                    <li><a href="{{ route('admin_logout') }}"><i class="fa fa-sign-out-alt fa-fw"></i>&nbsp;&nbsp;Logout</a></li>
                </ul>
            </div>
        <div class="admin-menu">
            <ul class="list-unstyled">
                <li id="dashboard">
                    <a href="{{ route('dashboard') }}" class="admin-menu-first" data-id="#dashboard">
                        <i class="fa fa-tachometer-alt fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li id="stok">
                    <a href="{{ route('stok') }}" class="admin-menu-first" data-id="#stok">
                        <i class="fa fa-box fa-fw"></i>
                        <span>Stok</span>
                    </a>
                </li>
                <li id="kategori">
                    <a href="{{ route('kategori') }}" class="admin-menu-first" data-id="#kategori">
                        <i class="fa fa-sitemap fa-fw" aria-hidden="true"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li id="pesanan">
                    <a href="{{ route('pesanan') }}" class="admin-menu-first" data-id="#pesanan">
                        <i class="fa fa-list fa-fw" aria-hidden="true"></i>
                        <span>Pesanan</span>
                    </a>
                </li>
                <li id="user">
                    <a href="{{ route('user') }}" class="admin-menu-first" data-id="#user">
                        <i class="fa fa-users fa-fw"></i>
                        <span>User</span>
                    </a>
                </li>
                <li id="slide">
                    <a href="{{ route('slide') }}" class="admin-menu-first" data-id="#slide">
                        <i class="fa fa-tag fa-fw"></i>
                        <span>Slide</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin_logout') }}" class="admin-menu-first admin-logout" data-id="#home" style="border-radius:4px;">
                        <span><i class="fas fa-sign-out-alt"></i></span>Keluar
                    </a>
                </li>
            </ul>
        </div>
        <div id="data" data-id="#@yield('menu')"></div>
        <div class="contents">@yield('content')</div>
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                var add = '@yield("add_btn")';
                $('#myTable_wrapper').prepend(add);

                @yield('jscp')
                
            });
        </script>
    </body>
</html>