@extends('panitia.layout')
@section('content')
<div class="mt-5">
    <form action="/pendaftar/{{ $pendaftar->nis }}" method="POST">
        @csrf
        @method('PUT')
        @if ($panitia == "pondok putra" || $panitia == "pondok putri" || $panitia == "tahfidz putra" || $panitia == "tahfidz putri")    
        <label>Asrama</label>
        <div class="input-group mb-3">
            <select name="asr_id" class="form-control" id="asrama">
                <option selected value="{{ $pendaftar->data->asr_id }}">{{ $pendaftar->data->asrama->nama }}</option>
                @foreach ($asrama as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        @endif
        <label>Nama</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $pendaftar->nama }}">
        </div>
        <label>NIK</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number" name="id" id="nik" value="{{ $pendaftar->id }}">
        </div>
        <label>NISN</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number" name="nisn" id="nisn" value="{{ $pendaftar->data->nisn }}">
        </div>
        <label>No. Akte Kelahiran</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="akte" id="akte" value="{{ $pendaftar->data->akte }}">
        </div>
        <label>No. Kartu Keluarga</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number" name="kk" id="kk" value="{{ $pendaftar->data->kk }}">
        </div>
        <label>Anak ke -</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number" name="anakke" id="anakke" value="{{ $pendaftar->data->anakke }}">
        </div>
        <div class="row">
            <div class="col col-6">
                <label>Tempat Lahir</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="tempat" id="tempat" value="{{ $pendaftar->data->tempat }}">
                </div>
            </div>
            <div class="col col-6">
                <label>Tanggal Lahir</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="tl" id="tl" value="{{ $pendaftar->data->tl }}">
                </div>
            </div>
        </div>
        @if ($panitia == "smp" || $panitia == "sma" || $panitia == "mi")    
        <label>Jenis Kelamin</label>
        <div class="input-group mb-3">
            <select name="kelamin" class="form-control" id="kelamin">
                <option value=""></option>
                <option value="L">Laki - laki</option>
                <option value="P">Perempuan</option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        @endif
        <label>Alamat</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $pendaftar->data->alamat }}">
        </div>
        <label>Provinsi</label>
        <div class="input-group mb-3">
            <select name="prov_id" class="form-control prov" id="prov">
                <option value="{{ $pendaftar->data->prov_id }}">{{ $pendaftar->data->prov->nama }}</option>
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
                <option value="{{ $pendaftar->data->kab_id }}">{{ $pendaftar->data->kab->nama }}</option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Kecamatan</label>
        <div class="input-group mb-3">
            <select name="kec_id" class="form-control kec" id="kec">
                <option value="{{ $pendaftar->data->kec_id }}">{{ $pendaftar->data->kec->nama }}</option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Desa/Kelurahan</label>
        <div class="input-group mb-3">
            <select name="des_id" class="form-control des" id="des">
                <option value="{{ $pendaftar->data->kel_id }}">{{ $pendaftar->data->kel->nama }}</option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <div class="row">
            <div class="col col-6">
                <label>RT</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control number" name="rt" id="rt" value="{{ $pendaftar->data->rt }}">
                </div>
            </div>
            <div class="col col-6">
                <label>RW</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control number" name="rw" id="rw" value="{{ $pendaftar->data->rw }}">
                </div>
            </div>
        </div>
        <label>Nama saudara/saudari di An-Nur II</label>
        <div class="input-group mb-3">
            <input type="text" name="saudara" class="form-control" id="saudara" value="{{ $pendaftar->data->saudara }}">
        </div>
        <label>Nama Ayah</label>
        <div class="input-group mb-3">
            @if ($pendaftar->wali->ayah != NULL)
            <input type="text" class="form-control" name="ayah" id="ayah" value="{{ $pendaftar->wali->ayah }}">
            @else
            <input type="text" class="form-control" name="ayah" id="ayah" value="-" disabled>
            @endif
        </div>
        <label>NIK Ayah</label>
        <div class="input-group mb-3">
            @if ($pendaftar->wali->a_nik != NULL)
            <input type="number" class="form-control number ayah" name="a_nik" id="a_nik" value="{{ $pendaftar->wali->a_nik }}">
            @else
            <input type="number" class="form-control number ayah" name="a_nik" id="a_nik" value="-" disabled>
            @endif
        </div>
        <label>Tanggal Lahir Ayah</label>
        <div class="input-group mb-3">
            @if ($pendaftar->wali->a_tl != NULL)
            <input type="date" class="form-control ayah" name="a_tl" id="a_tl" value="{{ $pendaftar->wali->a_tl }}">
            @else
            <input type="date" class="form-control ayah" name="a_tl" id="a_tl" value="-" disabled>
            @endif
        </div>
        <label>Pendidikan Ayah</label>
        <div class="input-group mb-3">
            <select name="a_pend" id="a_pend" class="form-control ayah">
                @if ($pendaftar->wali->a_pend != NULL)
                <option value="{{ $pendaftar->wali->a_pend }}">{{ $pendaftar->wali->pend_ayah->nama }}</option>
                @else
                <option value="" selected>-</option>
                @endif
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
            @if ($pendaftar->wali->a_telp != NULL)
            <input type="number" class="form-control number ayah" name="a_telp" id="a_telp" value="{{ $pendaftar->wali->a_telp }}">
            @else
            <input type="number" class="form-control number ayah" name="a_telp" id="a_telp" value="-" disabled>
            @endif
        </div>
        <label>Pekerjaan Ayah</label>
        <div class="input-group mb-3">
            <select name="a_ker" id="a_ker" class="form-control ayah">
                @if ($pendaftar->wali->a_ker != NULL)
                <option value="{{ $pendaftar->wali->a_ker }}">{{ $pendaftar->wali->ker_ayah->nama }}</option>
                @else
                <option value="" selected>-</option>
                @endif
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
                @if ($pendaftar->wali->a_has != NULL)
                <option value="{{ $pendaftar->wali->a_has }}">{{ $pendaftar->wali->has_ayah->keterangan }}</option>
                @else
                <option value="" selected>-</option>
                @endif
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
            @if ($pendaftar->wali->ibu != NULL)
            <input type="text" class="form-control" name="ibu" id="ibu" value="{{ $pendaftar->wali->ibu }}">
            @else
            <input type="text" class="form-control" name="ibu" id="ibu" value="-" disabled>
            @endif
        </div>
        <label>NIK ibu</label>
        <div class="input-group mb-3">
            @if ($pendaftar->wali->i_nik != NULL)
            <input type="number" class="form-control number ibu" name="i_nik" id="i_nik" value="{{ $pendaftar->wali->i_nik }}">
            @else
            <input type="number" class="form-control number ibu" name="i_nik" id="i_nik" value="-" disabled>
            @endif
        </div>
        <label>Tanggal Lahir ibu</label>
        <div class="input-group mb-3">
            @if ($pendaftar->wali->i_tl != NULL)
            <input type="date" class="form-control ibu" name="i_tl" id="i_tl" value="{{ $pendaftar->wali->i_tl }}">
            @else
            <input type="date" class="form-control ibu" name="i_tl" id="i_tl" value="-" disabled>
            @endif
        </div>
        <label>Pendidikan ibu</label>
        <div class="input-group mb-3">
            <select name="i_pend" id="i_pend" class="form-control">
                @if ($pendaftar->wali->i_pend != NULL)
                <option value="{{ $pendaftar->wali->i_pend }}">{{ $pendaftar->wali->pend_ibu->nama }}</option>
                @else
                <option value="" selected>-</option>
                @endif
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
            @if ($pendaftar->wali->i_telp != NULL)
            <input type="number" class="form-control number ibu" name="i_telp" id="i_telp" value="{{ $pendaftar->wali->i_telp }}">
            @else
            <input type="number" class="form-control number ibu" name="i_telp" id="i_telp" value="-" disabled>
            @endif
        </div>
        <label>Pekerjaan ibu</label>
        <div class="input-group mb-3">
            <select name="i_ker" id="i_ker" class="form-control ibu">
                @if ($pendaftar->wali->i_ker != NULL)
                <option value="{{ $pendaftar->wali->i_ker }}">{{ $pendaftar->wali->ker_ibu->nama }}</option>
                @else
                <option value="" selected>-</option>
                @endif
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
                @if ($pendaftar->wali->i_has != NULL)
                <option value="{{ $pendaftar->wali->i_has }}">{{ $pendaftar->wali->has_ibu->keterangan }}</option>
                @else
                <option value="" selected>-</option>
                @endif
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
            @if ($pendaftar->wali->wali != NULL)
            <input type="text" name="wali" class="form-control wali" id="wali" value="{{ $pendaftar->wali->wali }}">
            @else
            <input type="text" name="wali" class="form-control wali" id="wali" value="-" disabled>
            @endif
        </div>
        <label>Telepon/WhatsApp Wali</label>
        <div class="input-group mb-3">
            @if ($pendaftar->wali->w_telp != NULL)
            <input type="number" name="w_telp" class="form-control number wali" id="w_telp" value="{{ $pendaftar->wali->w_telp }}">
            @else
            <input type="text" name="w_telp" class="form-control wali" id="wali" value="-" disabled>
            @endif
        </div>
        <label>Pekerjaan Wali</label>
        <div class="input-group mb-3">
            <select name="w_ker" id="w_ker" class="form-control wali">
                @if ($pendaftar->wali->w_ker != NULL)
                <option value="{{ $pendaftar->wali->w_ker }}">{{ $pendaftar->wali->ker_wali->nama }}</option>
                @else
                <option value="" selected>-</option>
                @endif
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
                @if ($pendaftar->wali->w_has != NULL)
                <option value="{{ $pendaftar->wali->w_has }}">{{ $pendaftar->wali->has_wali->nama }}</option>
                @else
                <option value="" selected>-</option>
                @endif
                @foreach ($has as $item)
                    <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        @if ($panitia == "smp" || $panitia == "sma")
        <label>Nama Sekolah Asal</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="s_nama" id="s_nama" value="{{ $pendaftar->data->s_nama }}">
        </div>
        <label>Alamat Sekolah Asal</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="s_alamat" id="s_alamat" value="{{ $pendaftar->data->s_alamat }}">
        </div>
        <label>Provinsi Sekolah Asal</label>
        <div class="input-group mb-3">
            <select name="s_prov" class="form-control prov" id="s_prov">
                <option value="{{ $pendaftar->data->s_prov }}">{{ $pendaftar->data->prov_sekolah->nama }}</option>
                @foreach ($prov as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Kabupaten/Kota Sekolah Asal</label>
        <div class="input-group mb-3">
            <select name="s_kab" class="form-control kab" id="s_kab">
                <option value="{{ $pendaftar->data->s_kab }}">{{ $pendaftar->data->kab_sekolah->nama }}</option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Kecamatan Sekolah Asal</label>
        <div class="input-group mb-3">
            <select name="s_kec" class="form-control kec" id="s_kec">
                <option value="{{ $pendaftar->data->s_kec }}">{{ $pendaftar->data->kec_sekolah->nama }}</option>
            </select>
            <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
            </span>
        </div>
        <label>Tahun Lulus</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control number" name="lulus" id="lulus" value="{{ $pendaftar->data->lulus }}">
        </div>
        @endif
        <div class="d-flex justify-content-end mb-5">
            <a href="/panitia" type="button" class="btn btn-default">Batalkan</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection