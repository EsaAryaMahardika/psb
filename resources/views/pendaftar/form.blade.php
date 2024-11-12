<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PSB An-Nur II</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
    <link rel="stylesheet" type="text/css"
        href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>
    <div class="row">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <i class="fa-solid fa-sun me-2"></i>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="darkModeSwitch" data-bs-toggle="tooltip">
            </div>
            <i class="fa-solid fa-moon ms-2"></i>
        </div>
        <div class="page-content">
            <div class="wizard-v10-content mt-5">
                <div class="wizard-form">
                    <div class="wizard-header">
                        <h3>PSB An-Nur II</h3>
                    </div>
                    <form class="form-register" id="pendaftar">
                        @csrf
                        <div id="form-total">
                            <!-- Biodata -->
                            <h2>1</h2>
                            <section>
                                <div class="inner">
                                    @include('pendaftar/biodata')
                                </div>
                            </section>
                            <!-- Wali Santri -->
                            <h2>2</h2>
                            <section>
                                <div class="inner">
                                    @include('pendaftar/wali')
                                </div>
                            </section>
                            <!-- Pendidikan -->
                            <h2>3</h2>
                            <section>
                                <div class="inner">
                                    @include('pendaftar/pendidikan')
                                </div>
                            </section>
                            <!-- Track Record -->
                            <h2>4</h2>
                            <section>
                                <div class="inner">
                                    @include('pendaftar/trackrecord')
                                </div>
                            </section>
                            <!-- Konfirmasi -->
                            <h2>5</h2>
                            <section>
                                <div class="inner">
                                    @include('pendaftar/konfirmasi')
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="js/jquery.steps.js"></script>
    <script src="js/script.js"></script>
    <script>
        var kelamin = {{ $kelamin }};
        $(document).ready(function() {
            $("#kelamin").val(kelamin);
        });
    </script>
</body>

</html>