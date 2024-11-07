// Pindah halaman signin ke signup dan sebaliknya 
$('a[href="#"]').on('click', function(e) {
    e.preventDefault();
});

// Dark Mode
const $htmlElement = $('html');
const $switchElement = $('#darkModeSwitch');
const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
const currentTheme = localStorage.getItem('bsTheme') || (prefersDarkScheme ? 'dark' : 'light');
$htmlElement.attr('data-bs-theme', currentTheme);
$switchElement.prop('checked', currentTheme === 'dark');
$switchElement.on('change', function () {
    const newTheme = this.checked ? 'dark' : 'light';
    $htmlElement.attr('data-bs-theme', newTheme);
    localStorage.setItem('bsTheme', newTheme);
});
$('[data-bs-toggle="tooltip"]').each(function () {
    new bootstrap.Tooltip(this);
});

// Untuk input hanya angka
$('.number').on('keypress', function(event) {
    return event.which >= 48 && event.which <= 57;
});

$(function () {
    $("#form-total").steps({
      headerTag: "h2",
      bodyTag: "section",
      transitionEffect: "fade",
      enableAllSteps: false,
      autoFocus: true,
      transitionEffectSpeed: 500,
      titleTemplate: '<span class="title">#title#</span>',
      labels: {
        previous: "Prev",
        next: "Next",
        finish: "Confirm",
        current: "",
      },
      onStepChanging: function (event, currentIndex, newIndex) { 
        var asrama = $('#asrama').val();
        var nama = $('#nama').val();
        var nik = $('#nik').val();
        var nisn = $('#nisn').val();
        var akte = $('#akte').val();
        var kk = $('#kk').val();
        var anakke = $('#anakke').val();
        var tempat = $('#tempat').val();
        var tl = $('#tl').val();
        var kelamin = $('#kelamin').val();
        var alamat = $('#alamat').val();
        var prov = $('#prov').val();
        var kab = $('#kab').val();
        var kec = $('#kec').val();
        var des = $('#des').val();
        var rt = $('#rt').val();
        var rw = $('#rw').val();
        var saudara = $('#saudara').val();
        var ayah = $('#ayah').val();
        var a_nik = $('#a_nik').val();
        var a_tl = $('#a_tl').val();
        var a_pend = $('#a_pend').val();
        var a_telp = $('#a_telp').val();
        var a_ker = $('#a_ker').val();
        var a_has = $('#a_has').val();
        var ibu = $('#ibu').val();
        var i_nik = $('#i_nik').val();
        var i_tl = $('#i_tl').val();
        var i_pend = $('#i_pend').val();
        var i_telp = $('#i_telp').val();
        var i_ker = $('#i_ker').val();
        var i_has = $('#i_has').val();
        var wali = $('#wali').val();
        var w_telp = $('#w_telp').val();
        var w_ker = $('#w_ker').val();
        var w_has = $('#w_has').val();

        $('#asrama-val').text(asrama);
        $('#nama-val').text(nama);
        $('#nik-val').text(nik);
        $('#nisn-val').text(nisn);
        $('#akte-val').text(akte);
        $('#kk-val').text(kk);
        $('#anakke-val').text(anakke);
        $('#tempat-val').text(tempat);
        $('#tl-val').text(tl);
        $('#kelamin-val').text(kelamin);
        $('#alamat-val').text(alamat);
        $('#prov-val').text(prov);
        $('#kab-val').text(kab);
        $('#kec-val').text(kec);
        $('#des-val').text(des);
        $('#rt-val').text(rt);
        $('#rw-val').text(rw);
        $('#saudara-val').text(saudara);
        $('#ayah-val').text(ayah);
        $('#a_nik-val').text(a_nik);
        $('#a_tl-val').text(a_tl);
        $('#a_pend-val').text(a_pend);
        $('#a_telp-val').text(a_telp);
        $('#a_ker-val').text(a_ker);
        $('#a_has-val').text(a_has);
        $('#ibu-val').text(ibu);
        $('#i_nik-val').text(i_nik);
        $('#i_tl-val').text(i_tl);
        $('#i_pend-val').text(i_pend);
        $('#i_telp-val').text(i_telp);
        $('#i_ker-val').text(i_ker);
        $('#i_has-val').text(i_has);
        $('#wali-val').text(wali);
        $('#w_telp-val').text(w_telp);
        $('#w_ker-val').text(w_ker);
        $('#w_has-val').text(w_has);
        return true;
    }
    });
  });
  