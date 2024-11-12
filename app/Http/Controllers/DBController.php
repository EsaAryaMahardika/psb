<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\asrama;
use App\Models\provinsi;
use App\Models\kabupaten;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\pendaftar;
use App\Models\role;
use App\Models\soal;
use App\Models\track;
use App\Models\hapus;
use App\Models\jenjang;
use App\Models\pekerjaan;
use App\Models\pendidikan;
use App\Models\penghasilan;
use App\Models\survey;
use App\Models\token;
use App\Models\wali;

class DBController extends Controller
{
    // BAGIAN PENDAFTAR
    function index(){
        $survey = survey::all();
        $jenjang = jenjang::all();
        return view('index', compact('survey', 'jenjang'));
    }
    function daftar(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'id'       => 'required|min:16|max:16|unique:token,id',
            'gender'    => 'required|in:L,P',
            'wa'        => 'required|numeric',
            'jenjang'   => 'required|exists:jenjang,id',
            'survey'    => 'required|exists:survey,id',
        ], [
            'id.unique' => 'NIK ini sudah terdaftar. Gunakan NIK yang lain.',
            'id.min' => 'NIK harus 16 digit',
            'id.max' => 'NIK harus 16 digit'
        ]);
        // Generate NIS
        $tahun = '25';
        $jk = $request->gender === 'L' ? '1' : '2';
        $kodeJenjang = str_pad($request->jenjang, 2, '0', STR_PAD_LEFT);
        $lastNis = DB::table('token')
            ->where('jenjang_id', $request->jenjang)
            ->orderByDesc('nis')
            ->value('nis') ?? 0;
        $lastUrutan = intval(substr($lastNis, -4));
        $urutanMasuk = str_pad($lastUrutan + 1, 4, '0', STR_PAD_LEFT);
        $nis = "{$tahun}{$jk}{$kodeJenjang}{$urutanMasuk}";
        //Generate Token
        $token = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
        $password = Hash::make($token);
        Token::create([
            'nis'       => $nis,
            'nama'      => $request->nama,
            'id'       => $request->id,
            'kelamin'   => $request->gender,
            'wa'        => $request->wa,
            'jenjang_id'=> $request->jenjang,
            'survey_id' => $request->survey,
            'password'  => $password,
            'token'     => $token
        ]);
        Session::flash('success', 'Berhasil mendaftar! Tunggu pesan kami di WhatsApp untuk info lebih lanjut');
        return redirect('/');
    }
    public function login(Request $request)
    {
        $credentials = [
            'id' => $request->id,
            'password' => $request->password
        ];
        if (Auth::guard('pendaftar')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('form-pendaftar');
        }else{
            Session::flash('error-message','NIK atau token salah, silahkan periksa kembali');
            return back();
        }
    }
    function form() {
        $cek = Auth::guard('pendaftar')->user()->cek;
        if($cek){
            return redirect('form-lengkap');
        } else {
            $kelamin = Auth::guard('pendaftar')->user()->kelamin;
            $asrama = Asrama::where('kelamin', $kelamin)->get();
            $prov = provinsi::all();
            $pend = pendidikan::all();
            $ker = pekerjaan::all();
            $has = penghasilan::all();
            $soal = soal::all();
            $nama = Auth::guard('pendaftar')->user()->nama;
            $nik = Auth::guard('pendaftar')->user()->id;
            $kelamin = Auth::guard('pendaftar')->user()->kelamin;
            return view('pendaftar/form', compact('nama', 'nik', 'asrama', 'prov', 'pend', 'ker', 'has', 'soal', 'kelamin'));
        }
    }
    function form_complete(Request $request){
        $nis = Auth::guard('pendaftar')->user()->nis;
        $request->merge(['nis' => $nis]);
        DB::beginTransaction();
        try {
            pendaftar::create($request->except('_token'));
            wali::create($request->except('_token'));
            track::create($request->except('_token'));
            $pendaftar = token::where('nis', $nis)->first();
            $pendaftar->cek = true;
            $pendaftar->save();
            DB::commit();
            return redirect('form-lengkap');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal menyimpan data', 'error' => $e->getMessage()], 500);
        }
    }
    function form_done(Request $request){
        $nis = Auth::guard('pendaftar')->User()->nis;
        $pendaftar = token::where('nis', $nis)->first();
        return view('pendaftar.complete', compact('pendaftar'));
    }
    public function logout(Request $request)
    {
        Auth::guard('pendaftar')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // BAGIAN ADMIN
    function gelombang(Request $request) {
        $request->validate([
            'gelombang' => 'required|integer'
        ]);
        $gelombang = $request->input('gelombang');
        DB::statement("ALTER TABLE pendaftar MODIFY gelombang INT(3) NOT NULL DEFAULT $gelombang");
        return response()->json(['gelombang' => $gelombang]);
    }
    
    // BAGIAN PANITIA 
    function login_panitia(){
        return view('panitia.login');
    }
    public function cek_panitia(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::guard('panitia')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('panitia');
        }else{
            Session::flash('error-message','Invalid Username or Password');
            return back();
        }
    }
    function panitia(){
        // Memanggil data pendaftar putra (Filter per panitia) //
        // return view('panitia.admin'); Untuk admin
        return view('panitia.putra.index'); // Untuk panitia putra
        // return view('panitia.putri.index'); Untuk panitia putri
        // return view('panitia.mi.index'); Untuk panitia MI
        // return view('panitia.smp.index'); Untuk panitia SMP
        // return view('panitia.sma.index'); // Untuk panitia SMA
        // return view('panitia.tahfidz-putra.index'); Untuk panitia tahfidz putra
        // return view('panitia.tahfidz-putri.index'); Untuk panitia tahfidz putri
    }
    function get_pendaftar(){
        // Memanggil data berdasarkan nis yang akan diedit //
        $asrama = asrama::all();
        $prov = provinsi::all();
        $pend = pendidikan::all();
        $ker = pekerjaan::all();
        $has = penghasilan::all();
        return view('panitia.putra.edit', compact('asrama', 'prov', 'pend', 'has', 'ker')); // Untuk panitia putra
        // return view('panitia.putri.edit', compact('asrama', 'prov', 'pend', 'has', 'ker')); Untuk panitia putri
        // return view('panitia.mi.edit', compact('asrama', 'prov', 'pend', 'has', 'ker')); Untuk panitia MI
        // return view('panitia.smp.edit', compact('asrama', 'prov', 'pend', 'has', 'ker')); Untuk panitia SMP
        // return view('panitia.sma.edit', compact('asrama', 'prov', 'pend', 'has', 'ker')); Untuk panitia SMA
        // return view('panitia.tahfidz-putra.edit', compact('asrama', 'prov', 'pend', 'has', 'ker')); Untuk panitia tahfidz putra
        // return view('panitia.tahfidz-putri.edit', compact('asrama', 'prov', 'pend', 'has', 'ker')); Untuk panitia tahfidz putri
    }
    function put_pendaftar(){
        // Prosedur edit data
        //Session Flash
        // return view('panitia.putra.index'); Untuk panitia putra
        // return view('panitia.putri.index'); Untuk panitia putri
        // return view('panitia.mi.index'); Untuk panitia MI
        // return view('panitia.smp.index'); Untuk panitia SMP
        // return view('panitia.sma.index'); Untuk panitia SMA
        // return view('panitia.tahfidz-putra.index'); Untuk panitia tahfidz putra
        // return view('panitia.tahfidz-putri.index'); Untuk panitia tahfidz putri
    }
    function delete_pendaftar(){
        // Prosedur hapus data
        //Session Flash
        // return view('panitia.putra.index'); Untuk panitia putra
        // return view('panitia.putri.index'); Untuk panitia putri
        // return view('panitia.mi.index'); Untuk panitia MI
        // return view('panitia.smp.index'); Untuk panitia SMP
        // return view('panitia.SMA.index'); Untuk panitia SMA
        // return view('panitia.tahfidz-putra.index'); Untuk panitia tahfidz putra
        // return view('panitia.tahfidz-putri.index'); Untuk panitia tahfidz putri
    }

    // BAGIAN GET DATA WILAYAH
    public function kab($id)
    {
        $data = kabupaten::where('prov_id', $id)->pluck('nama', 'id')->toArray();
        return response()->json($data);
    }
    public function kec($id)
    {
        $data = kecamatan::where('kab_id', $id)->pluck('nama', 'id')->toArray();
        return response()->json($data);
    }
    public function kel($id)
    {
        $data = kelurahan::where('kec_id', $id)->pluck('nama', 'id')->toArray();
        return response()->json($data);
    }
}
