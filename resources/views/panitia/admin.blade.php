<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="" type="image/x-icon">
    <title>Admin - PSB An-Nur II</title>
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
        <div class="text-center" id="message">
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
            <hr>
            <h2>Peserta PSB</h2>
        </div>
        <div class="body mt-5">
            <div class="table-responsive">
                <table class="table table-hover js-basic dataTable table-custom spacing5">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kirim Token</th>
                            <th>Tanggal Daftar</th>
                            <th>Cek Bukti TF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftar as $item)    
                        <tr>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama }}</td>
                            @if ($item->isSend == 1)
                                <td><i class="fa fa-check"></i> Sudah terkirim</td>
                            @else
                                <td><a href="send/{{ $item->nis }}" class="btn btn-success">Kirim</a></td>
                            @endif
                            <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                            <td> 
                                <button class="btn btn-info" data-toggle="modal" data-target="#cek" data-bukti="{{ asset('storage/tf/'.$item->bukti) }}">Bukti TF</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cek" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bukti Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="cekBukti" src="" class="img-fluid" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
            </div>
        </div>
    </div>
</div>
<script src="/js/libscripts.bundle.js"></script>    
<script src="/js/vendorscripts.bundle.js"></script>    
<script src="/js/mainscripts.bundle.js"></script>
<script src="js/datatablescripts.bundle.js"></script>
<script src="/js/script.js"></script>
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
        $('#cek').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var imageSrc = button.data('bukti');
            $('#cekBukti').attr('src', imageSrc);
        });
    });
</script> 
</body>
</html>