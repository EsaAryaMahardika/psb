<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Nama Sekolah Asal</label>
        <input type="text" name="s_nama" class="form-control" id="s_asal">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Alamat Sekolah Asal</label>
        <input type="text" name="s_alamat" class="form-control" id="s_alamat">
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Provinsi Sekolah Asal</label>
        <select name="s_prov" class="form-control prov" id="s_prov">
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
        <label>Kabupaten Sekolah Asal</label>
        <select name="s_kab" class="form-control kab" id="s_kab">
            <option value=""></option>
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Kecamatan Sekolah Asal</label>
        <select name="s_kec" class="form-control kec" id="s_kec">
            <option value=""></option>
        </select>
        <span class="select-btn">
            <i class="zmdi zmdi-chevron-down"></i>
        </span>
    </div>
</div>
<div class="form-row">
    <div class="form-holder form-holder-2">
        <label>Tahun Kelulusan</label>
        <input type="number" name="lulus" class="form-control number" id="lulus">
    </div>
</div>