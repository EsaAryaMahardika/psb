<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="" type="image/x-icon">
    <title>Admin - PSB An-Nur II</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
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
                        <li><a class="icon-menu" id="mode"><i class="fa fa-2x fa-sun" id="icon"></i></a></li>
                        <li><a href="" class="icon-menu"><i class="fa fa-2x fa-power-off"></i></a></li>
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
                    <span>Selamat Datang</span>
                    <div class="user-name"><strong>Admin</strong></div>
                </div>
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="{{ Request::segment(2) === 'index2' ? 'active open' : null }}"><a href="/panitia"><i
                                class="fa fa-home"></i><span>Dashboard</span></a></li>
                </ul>
            </nav>     
        </div>
    </div>
    <div id="main-content">
        <div class="container-fluid">
            <div class="row clearfix mt-5">
                <div class="col-12">
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ganti Gelombang</h5>
                                <p class="card-text">Jadwal Gelombang:</p>
                                <p class="card-text">Gelombang 1: 1 Desember - 31 Januari</p>
                                <p class="card-text">Gelombang 2: 1 Februari - 28 Februari</p>
                                <p class="card-text">Gelombang 3: 1 Maret - 31 Maret</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="gelombang">Gelombang saat ini</label>
                                    </div>
                                    <select class="custom-select" id="gelombang">
                                        <option value="1" {{ $gelombangDefault == 1 ? 'selected' : '' }}>Gelombang 1</option>
                                        <option value="2" {{ $gelombangDefault == 2 ? 'selected' : '' }}>Gelombang 2</option>
                                        <option value="3" {{ $gelombangDefault == 3 ? 'selected' : '' }}>Gelombang 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Musim PSB</h5>
                                <p>Status:</p>
                                <button class="btn btn-primary">Buka</button>
                                <button class="btn btn-primary">Tutup</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/libscripts.bundle.js"></script>    
<script src="js/vendorscripts.bundle.js"></script>    
<script src="js/mainscripts.bundle.js"></script>
<script>
    $(document).ready(function() {
        $('#gelombang').on('change', function() {
            var selectedGelombang = $(this).val();

            $.ajax({
                url: '/gelombang',
                type: 'POST',
                data: {
                    gelombang: selectedGelombang,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert('Default gelombang berhasil diubah menjadi Gelombang ' + response.gelombang);
                },
                error: function(xhr) {
                    console.error('Terjadi kesalahan:', xhr.responseText);
                }
            });
        });
    });
</script>    
</body>
</html>