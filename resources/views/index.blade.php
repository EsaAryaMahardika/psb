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
      @error('id')
      <div class="alert danger-alert">
        <p>{{ $message }}</p>
        <a class="close">&times;</a>
      </div>
      @enderror
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
            <form class="row scroll form px-4 text-center" action="/daftar" method="POST">
              @csrf
              <select name="survey" class="custom-select" required="required" id="survey">
                <option value="" disabled selected>
                  Kenal An-Nur II dari mana?
                </option>
                @foreach ($survey as $item)
                    <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                @endforeach
              </select>
              <input type="text" name="nama" placeholder="Nama" class="form-control" id="nama" value="{{ old('nama') }}" />
              <input type="number" name="id" placeholder="Nomor Induk Keluarga" class="number form-control" id="id" value="{{ old('id') }}"/>
              <select name="gender" class="custom-select" required="required" id="gender">
                <option value="" disabled selected>Jenis Kelamin</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
              </select>
              <input type="number" name="wa" placeholder="Nomor WhatsApp" class="number form-control" id="wa" value="{{ old('wa') }}"/>
              <select name="jenjang" class="custom-select" required="required" id="jenjang">
                <option value="" disabled selected>Jenjang yang akan ditempuh</option>
                @foreach ($jenjang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
              <button class="btn btn-dark btn-block" type="submit">Daftar</button>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <form class="form px-4 text-center" action="/login" method="POST">
              @csrf
              <input type="text" name="id" class="form-control number" placeholder="NIK"/>
              <input type="text" name="password" class="form-control number" placeholder="Token"/>
              <button class="btn btn-dark btn-block" type="submit">Masuk</button>
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