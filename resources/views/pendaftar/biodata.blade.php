<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Pilih Asrama</label>
        <select name="asr_id" class="form-control" id="asrama">
            <option disabled selected>Silahkan dipilih</option>
            @foreach ($asrama as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="{{ $nama }}" id="nama">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>NIK</label>
        <input type="number" class="form-control number" name="nik" value="{{ $nik }}" id="nik">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>NISN</label>
        <input type="number" class="form-control number" name="nisn" id="nisn">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>No. Akte Kelahiran</label>
        <input type="text" class="form-control" name="akte" id="akte">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>No. Kartu Keluarga</label>
        <input type="number" class="form-control number" name="kk" id="kk">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Anak ke -</label>
        <input type="number" class="form-control number" name="anakke" id="anakke">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat" id="tempat">
    </div>
    <div class="form-holder form-holder-2">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" name="tl" id="tl">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Jenis Kelamin</label>
        <select name="kelamin" class="form-control" id="kelamin">
            <option value="L">Laki - laki</option>
            <option value="P">Perempuan</option>
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Alamat</label>
        <input type="text" class="form-control" name="alamat" id="alamat">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Provinsi</label>
        <select name="prov_id" class="form-control prov" id="prov">
            @foreach ($prov as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Kabupaten/Kota</label>
        <select name="kab_id" class="form-control kab" id="kab">
            <option value=""></option>
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Kecamatan</label>
        <select name="kec_id" class="form-control kec" id="kec">
            <option value=""></option>
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Desa/Kelurahan</label>
        <select name="kel_id" class="form-control des" id="des">
            <option value=""></option>
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>RT</label>
        <input type="number" class="form-control number" name="rt" id="rt">
    </div>
    <div class="form-holder form-holder-2">
        <label>RW</label>
        <input type="number" class="form-control number" name="rw" id="rw">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Nama saudara/saudari di An-Nur II</label>
        <input type="text" name="saudara" class="form-control" id="saudara">
    </div>
</div>