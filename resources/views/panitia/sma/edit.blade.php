@extends('panitia.putri.layout')
@section('content')
<div class="mt-5">
    <form action="/pendaftar/{{ nis }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="nama" id="nama" value="">
        </div>
        <label>NIK</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number" name="nik" id="nik" value="">
        </div>
        <label>NISN</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number" name="nisn" id="nisn" value="">
        </div>
        <label>No. Akte Kelahiran</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="akte" id="akte" value="">
        </div>
        <label>No. Kartu Keluarga</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number" name="kk" id="kk" value="">
        </div>
        <label>Anak ke -</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number" name="anakke" id="anakke" value="">
        </div>
        <div class="row">
            <div class="col col-6">
                <label>Tempat Lahir</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="tempat" id="tempat" value="">
                </div>
            </div>
            <div class="col col-6">
                <label>Tanggal Lahir</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="tl" id="tl" value="">
                </div>
            </div>
        </div>
        <label>Alamat</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="alamat" id="alamat" value="">
        </div>
        <label>Provinsi</label>
        <div class="input-group mb-3">
            <select name="prov_id" class="form-control prov" id="prov">
                <option value=""></option>
                @foreach ($prov as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Kabupaten/Kota</label>
        <div class="input-group mb-3">
            <select name="kab_id" class="form-control kab" id="kab">
                <option value=""></option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Kecamatan</label>
        <div class="input-group mb-3">
            <select name="kec_id" class="form-control kec" id="kec">
                <option value=""></option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Desa/Kelurahan</label>
        <div class="input-group mb-3">
            <select name="des_id" class="form-control des" id="des">
                <option value=""></option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <div class="row">
            <div class="col col-6">
                <label>RT</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control number" name="rt" id="rt" value="">
                </div>
            </div>
            <div class="col col-6">
                <label>RW</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control number" name="rw" id="rw" value="">
                </div>
            </div>
        </div>
        <label>Nama saudara/saudari di An-Nur II</label>
        <div class="input-group mb-3">
            <input type="text" name="saudara" class="form-control" id="saudara" value="">
        </div>
        <label>Nama Ayah</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="ayah" id="ayah" value="">
        </div>
        <label>NIK Ayah</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number ayah" name="a_nik" id="a_nik" value="">
        </div>
        <label>Tanggal Lahir Ayah</label>
        <div class="input-group mb-3">
            <input type="date" class="form-control ayah" name="a_tl" id="a_tl" value="">
        </div>
        <label>Pendidikan Ayah</label>
        <div class="input-group mb-3">
            <select name="a_pend" id="a_pend" class="form-control ayah" >
                <option value=""></option>
                @foreach ($pend as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Telepon/WhatsApp Ayah</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number ayah" name="a_telp" id="a_telp" value="">
        </div>
        <label>Pekerjaan Ayah</label>
        <div class="input-group mb-3">
            <select name="a_ker" id="a_ker" class="form-control ayah">
                <option value=""></option>
                @foreach ($ker as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Penghasilan Ayah</label>
        <div class="input-group mb-3">
            <select name="a_has" id="a_has" class="form-control ayah">
                <option value=""></option>
                @foreach ($has as $item)
                    <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Nama ibu</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="ibu" id="ibu" value="">
        </div>
        <label>NIK ibu</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number ibu" name="i_nik" id="i_nik" value="">
        </div>
        <label>Tanggal Lahir ibu</label>
        <div class="input-group mb-3">
            <input type="date" class="form-control ibu" name="i_tl" id="i_tl" value="">
        </div>
        <label>Pendidikan ibu</label>
        <div class="input-group mb-3">
            <select name="i_pend" id="i_pend" class="form-control">
                <option value=""></option>
                @foreach ($pend as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Telepon/WhatsApp ibu</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number ibu" name="i_telp" id="i_telp" value="">
        </div>
        <label>Pekerjaan ibu</label>
        <div class="input-group mb-3">
            <select name="i_ker" id="i_ker" class="form-control ibu">
                <option value=""></option>
                @foreach ($ker as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
                <option value="13">Ibu Rumah Tangga</option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Penghasilan ibu</label>
        <div class="input-group mb-3">
            <select name="i_has" id="i_has" class="form-control ibu">
                <option value=""></option>
                @foreach ($has as $item)
                    <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Nama Wali</label>
        <div class="input-group mb-3">
            <input type="text" name="wali" class="form-control wali" id="wali" value="">
        </div>
        <label>Telepon/WhatsApp Wali</label>
        <div class="input-group mb-3">
            <input type="number" name="w_telp" class="form-control number wali" id="w_telp" value="">
        </div>
        <label>Pekerjaan Wali</label>
        <div class="input-group mb-3">
            <select name="w_ker" id="w_ker" class="form-control wali">
                <option value=""></option>
                @foreach ($ker as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
                <option value="13">Ibu Rumah Tangga</option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Penghasilan Wali</label>
        <div class="input-group mb-3">
            <select name="w_has" id="w_has" class="form-control wali">
                <option value=""></option>
                @foreach ($has as $item)
                    <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Nama Sekolah Asal</label>
        <div class="input-group mb-3">
            <input type="text" name="asal" class="form-control">
        </div>
        <label>Alamat Sekolah Asal</label>
        <div class="input-group mb-3">
            <input type="text" name="alamat" class="form-control">
        </div>
        <label>Provinsi Sekolah Asal</label>
        <div class="input-group mb-3">
            <select name="prov_id" class="form-control prov">
                @foreach ($prov as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Kabupaten Sekolah Asal</label>
        <div class="input-group mb-3">
            <select name="kab_id" class="form-control kab">
                <option value=""></option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Kecamatan Sekolah Asal</label>
        <div class="input-group mb-3">
            <select name="kec_id" class="form-control kec">
                <option value=""></option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Tahun Kelulusan</label>
        <div class="input-group mb-3">
            <input type="number" name="lulus" class="form-control number">
        </div>
        <div class="d-flex justify-content-end mb-5">
            <a href="/panitia" type="button" class="btn btn-default">Batalkan</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection