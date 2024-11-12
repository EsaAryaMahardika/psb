<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Nama Ayah</label>
        <input type="text" class="form-control" name="ayah" id="ayah">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Status Ayah</label>
        <select name="a_sta" id="a_sta" class="form-control">
            <option value="H">Hidup</option>
            <option value="M">Meninggal</option>
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>NIK Ayah</label>
        <input type="number" class="form-control number ayah" name="a_nik" id="a_nik">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Tanggal Lahir Ayah</label>
        <input type="date" class="form-control ayah" name="a_tl" id="a_tl">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Pendidikan Ayah</label>
        <select name="a_pend" id="a_pend" class="form-control ayah">
            <option value="" disabled selected></option>
            @foreach ($pend as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Telepon/WhatsApp Ayah</label>
        <input type="number" class="form-control number ayah" name="a_telp" id="a_telp">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Pekerjaan Ayah</label>
        <select name="a_ker" id="a_ker" class="form-control ayah">
            <option value="" disabled selected></option>
            @foreach ($ker as $item)
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
        <label>Penghasilan Ayah</label>
        <select name="a_has" id="a_has" class="form-control ayah">
            <option value="" disabled selected></option>
            @foreach ($has as $item)
            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
            @endforeach
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Nama ibu</label>
        <input type="text" class="form-control" name="ibu" id="ibu">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Status ibu</label>
        <select id="i_sta" class="form-control">
            <option value="H">Hidup</option>
            <option value="M">Meninggal</option>
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>NIK ibu</label>
        <input type="number" class="form-control number ibu" name="i_nik" id="i_nik">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Tanggal Lahir ibu</label>
        <input type="date" class="form-control ibu" name="i_tl" id="i_tl">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Pendidikan ibu</label>
        <select name="i_pend" id="i_pend" class="form-control ibu">
            <option value="" disabled selected></option>
            @foreach ($pend as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Telepon/WhatsApp ibu</label>
        <input type="number" class="form-control number ibu" name="i_telp" id="i_telp">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Pekerjaan ibu</label>
        <select name="i_ker" id="i_ker" class="form-control ibu">
            <option value="" disabled selected></option>
            @foreach ($ker as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
            <option value="13">Ibu Rumah Tangga</option>
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Penghasilan ibu</label>
        <select name="i_has" id="i_has" class="form-control ibu">
            <option value="" disabled selected></option>
            @foreach ($has as $item)
            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
            @endforeach
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Apakah santri memiliki wali (pengganti ortu)?</label>
        <select id="w_sta" class="form-control">
            <option value="" disabled selected></option>
            <option value="ya">Iya</option>
            <option value="tidak">Tidak</option>
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Nama Wali</label>
        <input type="text" name="wali" class="form-control wali" id="wali">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Telepon/WhatsApp Wali</label>
        <input type="number" name="w_telp" class="form-control number wali" id="w_telp">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Pekerjaan Wali</label>
        <select name="w_ker" id="w_ker" class="form-control wali">
            <option value="" disabled selected></option>
            @foreach ($ker as $item)
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
        <label>Penghasilan Wali</label>
        <select name="w_has" id="w_has" class="form-control wali">
            <option value="" disabled selected></option>
            @foreach ($has as $item)
            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
            @endforeach
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>