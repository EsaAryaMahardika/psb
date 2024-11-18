<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="" type="image/x-icon">
    <title>Panitia Putra - PSB An-Nur II</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="/vendor/animate-css/vivify.min.css">
    <link rel="stylesheet" href="/css/site.min.css">
</head>

<body class="theme-light font-montserrat light_version">
<div id="wrapper">
    <nav class="navbar top-navbar">
        <div class="container-fluid">
            <div class="navbar-left">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
            </div>        
            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li><a class="icon-menu" id="mode"><i class="fa fa-2x fa-sun" id="icon"></i></a></li>
                        <li><a href="/logout-panitia" class="icon-menu"><i class="fa fa-2x fa-power-off"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <span>Panitia PSB</span>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="/images/user.png" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Selamat Datang</span>
                    <div class="user-name"><strong>Panitia <span class="text-uppercase">{{ $panitia }}</span></strong></div>
                </div>
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="{{ Request::segment(2) === 'index2' ? 'active open' : null }}"><a href="/panitia"><i
                                class="fa fa-home"></i><span>Data Pendaftar</span></a></li>
                </ul>
            </nav>     
        </div>
    </div>
    <div id="main-content">
        @if(Session::has('success'))
        <div class="alert success-alert">
            <p>{{ Session::get('success') }}</p>
            <a class="close">&times;</a>
        </div>
        @elseif(Session::has('error-message'))
        <div class="alert danger-alert">
            <p>{{ Session::get('error-message') }}</p>
            <a class="close">&times;</a>
        </div>
        @endif
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
<script src="/js/libscripts.bundle.js"></script>    
<script src="/js/vendorscripts.bundle.js"></script>    
<script src="/js/mainscripts.bundle.js"></script>
<script src="/js/script.js"></script>
@yield('script')
</body>
</html>