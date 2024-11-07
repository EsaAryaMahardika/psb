<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="" type="image/x-icon">
    <title> - PSB An-Nur II</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/animate-css/vivify.min.css">
    <link rel="stylesheet" href="css/site.min.css">
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
                        <li><a href="" class="icon-menu"><i class="fa fa-power-off"></i></a></li>
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
                    <img src="images/user.png" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <div class="user-name"><strong>Louis Pierce</strong></div>
                </div>
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="header">Main</li>                
                    <li class="{{ Request::segment(1) === 'mypage' ? 'active open' : null }}">
                        <a href="#myPage" class="has-arrow"><i class="fa fa-home"></i><span>My Page</span></a>
                        <ul>
                            <li class="{{ Request::segment(2) === 'index' ? 'active' : null }}"><a href="">My Dashboard</a></li>
                            <li class="{{ Request::segment(2) === 'index4' ? 'active' : null }}"><a href="">Web Analytics</a></li>
                            <li class="{{ Request::segment(2) === 'index5' ? 'active' : null }}"><a href="">Event Monitoring</a></li>
                            <li class="{{ Request::segment(2) === 'index6' ? 'active' : null }}"><a href="">Finance Performance</a></li>
                            <li class="{{ Request::segment(2) === 'index7' ? 'active' : null }}"><a href="">Sales Monitoring</a></li>
                            <li class="{{ Request::segment(2) === 'index8' ? 'active' : null }}"><a href="">Hospital Management</a></li>
                            <li class="{{ Request::segment(2) === 'index9' ? 'active' : null }}"><a href="">Campaign Monitoring</a></li>
                            <li class="{{ Request::segment(2) === 'index10' ? 'active' : null }}"><a href="">University Analytics</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::segment(2) === 'index2' ? 'active open' : null }}"><a href=""><i class="fa fa-peoples"></i><span>Dashboard</span></a></li>
                </ul>
            </nav>     
        </div>
    </div>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>@yield('title')</h1>
                    </div>            
                </div>
            </div>
            {{-- @yield('content') --}}
            <h1>Hello World</h1>
        </div>
    </div>
</div>
<script src="js/libscripts.bundle.js"></script>    
<script src="js/vendorscripts.bundle.js"></script>    
</body>
</html>