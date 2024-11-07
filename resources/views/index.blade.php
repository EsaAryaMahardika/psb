<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PSB An-Nur II</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css"/>
  </head>
  <body>
    <div class="row d-flex justify-content-center align-items-center container">
      <h1 class="text-center mb-4 fw-bold">Selamat Datang di Pendaftaran Santri An-Nur II!</h1>
      <span class="text-center mb-4">Silahkan mendaftarkan diri dengan mengisi data di bawah ini. Jika sudah silahkan tunggu pesan dari kami melalui WhatsApp untuk masuk mengisi kelengkapan data.</span>
      <div class="card">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item text-center">
            <a class="nav-link active btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Daftar</a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Masuk</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form action="#" class="row scroll form px-4 text-center">
              <select name="pondok" class="custom-select" required="required">
                <option value="" disabled selected>
                  Kenal An-Nur II dari mana?
                </option>
                {{-- @foreach ($survey as $item)
                    <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                @endforeach --}}
              </select>
              <input type="name" placeholder="Nama" class="form-control" />
              <input type="number" placeholder="Nomor Induk Keluarga" class="number form-control"/>
              <select name="gender" class="custom-select" required="required">
                <option value="" disabled selected>Jenis Kelamin</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
              </select>
              <input type="number" placeholder="Nomor WhatsApp" class="number form-control" />
              <select name="jenjang" class="custom-select" required="required">
                <option value="" disabled selected>Jenjang berikutnya</option>
                {{-- @foreach ($jenjang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach --}}
              </select>
              <button class="btn btn-dark btn-block" id="submit">Daftar</button>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <form class="form px-4 text-center" action="/login" method="POST">
              @csrf
              <input type="text" name="nik" class="form-control number" placeholder="NIK"/>
              <input type="text" name="token" class="form-control number" placeholder="Token"/>
              <button class="btn btn-dark btn-block" id="signin">Masuk</button>
            </form>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center align-items-center mt-5">
        <i class="fa-solid fa-sun me-2"></i>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="darkModeSwitch" data-bs-toggle="tooltip">
        </div>
        <i class="fa-solid fa-moon ms-2"></i>
      </div>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>