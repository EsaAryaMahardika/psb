<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\soal;
use App\Models\wali;
use App\Models\hapus;
use App\Models\token;
use App\Models\track;
use App\Models\alasan;
use App\Models\asrama;
use App\Models\survey;
use App\Models\jenjang;
use App\Models\provinsi;
use App\Models\kabupaten;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\pekerjaan;
use App\Models\pendaftar;
use App\Models\pendidikan;
use App\Models\penghasilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DBController extends Controller
{
    // BAGIAN PENDAFTAR
    function index()
    {
        $survey = survey::all();
        $jenjang = jenjang::all();
        $biaya = "Rp 300.000";
        $rekening = "4321-1979-02";
        return view('index', compact('survey', 'jenjang', 'biaya', 'rekening'));
    }
    function daftar(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'id'        => 'required|min:16|max:16|unique:token,id',
            'gender'    => 'required|in:L,P',
            'wa'        => 'required|numeric',
            'jenjang'   => 'required|exists:jenjang,id',
            'survey'    => 'required|exists:survey,id',
            'bukti'     => 'required|mimes:jpeg,png,jpg|max:5120',
        ], [
            'id.unique' => 'NIK ini sudah terdaftar. Gunakan NIK yang lain.',
            'id.min'    => 'NIK harus 16 digit',
            'id.max'    => 'NIK harus 16 digit',
            'bukti.max' => 'Gambar terlalu besar',
            'bukti.mimes' => 'Harap gunakan format gambar JPEG, PNG, atau JPG'
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
        //Bukti Transfer
        $imageName = $request->file('bukti')->getClientOriginalName();
        $path = $request->file('bukti')->move(public_path('tf'), $imageName);
        $bukti = pathinfo($path, PATHINFO_BASENAME);
        Token::create([
            'nis'       => $nis,
            'nama'      => $request->nama,
            'id'       => $request->id,
            'kelamin'   => $request->gender,
            'wa'        => $request->wa,
            'jenjang_id'=> $request->jenjang,
            'survey_id' => $request->survey,
            'password'  => $password,
            'token'     => $token,
            'bukti' => $bukti,
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
        } else {
            Session::flash('error-message', 'NIK atau token salah, silahkan periksa kembali');
            return back();
        }
    }
    function form()
    {
        $cek = Auth::guard('pendaftar')->user()->cek;
        if ($cek) {
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
            $jenjang = Auth::guard('pendaftar')->user()->jenjang_id;
            return view('pendaftar/form', compact('nama', 'nik', 'asrama', 'prov', 'pend', 'ker', 'has', 'soal', 'kelamin', 'jenjang'));
        }
    }
    function form_complete(Request $request)
    {
        $nis = Auth::guard('pendaftar')->user()->nis;
        $request->merge(['nis' => $nis]);
        DB::beginTransaction();
        try {
            $jenjang = Auth::guard('pendaftar')->user()->jenjang_id;
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
    function form_done(Request $request)
    {
        $nis = Auth::guard('pendaftar')->User()->nis;
        $pendaftar = token::where('nis', $nis)->first();
        $jenjang = Auth::guard('pendaftar')->user()->jenjang_id;
        return view('pendaftar.complete', compact('pendaftar', 'jenjang'));
    }
    public function logout(Request $request)
    {
        Auth::guard('pendaftar')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // BAGIAN ADMIN
    function gelombang(Request $request)
    {
        $request->validate([
            'gelombang' => 'required|integer'
        ]);
        $gelombang = $request->input('gelombang');
        DB::statement("ALTER TABLE pendaftar MODIFY gelombang INT(3) NOT NULL DEFAULT $gelombang");
        return response()->json(['gelombang' => $gelombang]);
    }
    function send_message($nis){
        // DB::beginTransaction();
        try {
            $nik = token::where('nis', $nis)->value('id');
            $token = token::where('nis', $nis)->value('token');
            $wa = token::where('nis', $nis)->value('wa');
            $cek = Http::withHeaders([
                'Authorization' => 'mfS3mnRYGSWvh21W3o5f',
            ])->post('https://api.fonnte.com/send', [
                'target' => $wa,
                'message' => "Terimakasih telah mempercayakan kami sebagai tempat belajar! Akses login anda: NIK = {$nik} Token = {$token}. Mohon untuk melengkapi formulir pendaftaran di menu Masuk."

            ]);
            $pendaftar = token::where('nis', $nis);
            $pendaftar->update(['isSend' => 1]);
            DB::commit();
            return redirect('/panitia')->with('success-message','Token berhasil dikirim');
            // dd(json_decode($cek,true));
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal mengirim token', 'error' => $e->getMessage()], 500);
        }
    }

    // BAGIAN PANITIA 
    function login_panitia()
    {
        return view('panitia.login');
    }
    public function cek_panitia(Request $request)
    {
        $credentials = [
            'id' => $request->id,
            'password' => $request->password
        ];
        if (Auth::guard('panitia')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/panitia');
        } else {
            Session::flash('error-message', 'Username atau Password Salah!');
            return back();
        }
    }
    function panitia()
    {
        $panitia = Auth::guard('panitia')->User()->id;
        $alasan = alasan::all();
        switch ($panitia) {
            case 'pondok putra':
                $pendaftar = token::whereHas('data', function ($query) {
                    $query->where('asr_id', 1);
                })->get();
                return view('panitia.index', compact('pendaftar', 'panitia', 'alasan'));
            case 'pondok putri':
                $pendaftar = token::whereHas('data', function ($query) {
                    $query->where('asr_id', 3);
                })->get();
                return view('panitia.index', compact('pendaftar','panitia', 'alasan'));
            case 'mi':
                $pendaftar = token::where('jenjang_id', 1)->get();
                return view('panitia.index', compact('pendaftar','panitia', 'alasan'));
            case 'smp':
                $pendaftar = token::where('jenjang_id', 2)->get();
                return view('panitia.index', compact('pendaftar','panitia', 'alasan'));
            case 'sma':
                $pendaftar = token::where('jenjang_id', 3)->get();
                return view('panitia.index', compact('pendaftar','panitia', 'alasan'));
            case 'tahfidz putra':
                $pendaftar = token::whereHas('data', function ($query) {
                    $query->where('asr_id', 2);
                })->get();
                return view('panitia.index', compact('pendaftar','panitia', 'alasan'));
            case 'tahfidz putri':
                $pendaftar = token::whereHas('data', function ($query) {
                    $query->where('asr_id', [4, 5]);
                })->get();
                return view('panitia.index', compact('pendaftar','panitia', 'alasan'));
            case 'admin':
                $pendaftar = token::all();
                $gelombangDefault = DB::table('INFORMATION_SCHEMA.COLUMNS')
                    ->select('COLUMN_DEFAULT')
                    ->where('TABLE_NAME', 'pendaftar') // Ganti dengan nama tabel
                    ->where('COLUMN_NAME', 'gelombang') // Nama kolom
                    ->value('COLUMN_DEFAULT');
                return view('panitia.admin', compact('pendaftar', 'gelombangDefault', 'panitia'));
            default:
                Session::flash('error-message', 'Username tidak ada!');
                return back();
        }
    }
    function get_pendaftar($nis)
    {
        $pendaftar = token::where('nis', $nis)->first();
        $asrama = asrama::all();
        $prov = provinsi::all();
        $pend = pendidikan::all();
        $ker = pekerjaan::all();
        $has = penghasilan::all();
        $panitia = Auth::guard('panitia')->User()->id;
        switch ($panitia) {
            case 'pondok putra':
                return view('panitia.edit', compact('asrama', 'prov', 'pend', 'has', 'ker', 'pendaftar', 'panitia'));
            case 'pondok putri':
                return view('panitia.edit', compact('asrama', 'prov', 'pend', 'has', 'ker', 'pendaftar', 'panitia'));
            case 'mi':
                return view('panitia.edit', compact('asrama', 'prov', 'pend', 'has', 'ker', 'pendaftar', 'panitia'));
            case 'smp':
                return view('panitia.edit', compact('asrama', 'prov', 'pend', 'has', 'ker', 'pendaftar', 'panitia'));
            case 'sma':
                return view('panitia.edit', compact('asrama', 'prov', 'pend', 'has', 'ker', 'pendaftar', 'panitia'));
            case 'tahfidz putra':
                return view('panitia.edit', compact('asrama', 'prov', 'pend', 'has', 'ker', 'pendaftar', 'panitia'));
            case 'tahfidz putri':
                return view('panitia.edit', compact('asrama', 'prov', 'pend', 'has', 'ker', 'pendaftar', 'panitia'));
            default:
                Session::flash('error-message', 'Username tidak ada!');
                return back();
        }
    }
    function put_pendaftar(Request $request, $nis)
    {
        $token = token::where('nis', $nis);
        $wali = wali::where('nis', $nis);
        $pendaftar = pendaftar::where('nis', $nis);
        DB::beginTransaction();
        try {
            $pendaftar->update($request->only(
                'asr_id',
                'nisn',
                'akte',
                'kk',
                'anakke',
                'tempat',
                'tl',
                'alamat',
                'prov_id',
                'kab_id',
                'kec_id',
                'kel_id',
                'rt',
                'rw',
                'saudara',
                's_nama',
                's_alamat',
                's_prov',
                's_kab',
                's_kec',
                'lulus',
            ));
            $token->update($request->only(
                'nama',
                'id',
                'wa'
            ));
            $wali->update($request->only(
                'ayah',
                'a_nik',
                'a_tl',
                'a_pend',
                'a_telp',
                'a_ker',
                'a_has',
                'ibu',
                'i_nik',
                'i_tl',
                'i_pend',
                'i_telp',
                'i_ker',
                'i_has',
                'wali',
                'w_telp',
                'w_ker',
                'w_has'
            ));
            $nama = token::where('nis', $nis)->value('nama');
            DB::commit();
            Session::flash('success-message', "Data atas nama {$nama} berhasil diubah");
            return redirect('/panitia');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error-message', 'Data gagal diubah');
            return redirect('/panitia');
        }
    }
    function before_delete($nis)
    {
        $nama = token::where('nis', $nis)->value('nama');
        return response()->json(['nama' => $nama]);
    }
    function delete_pendaftar(Request $request, $nis)
    {
        $data = token::where('nis', $nis)->first();
        $pendaftar = $data->only(['nis', 'nama']);
        DB::beginTransaction();
        try {
            hapus::create([
                'nis' => $pendaftar['nis'],
                'nama' => $pendaftar['nama'],
                'alasan_id' => $request->alasan_id,
                'jenjang_id' => $request->jenjang_id
            ]);
            $data->delete();
            DB::commit();
            Session::flash('success-message', 'Data berhasil dihapus');
            $message = Session::get('success-message');
            return response()->json([
                'status' => 'success',
                'message' => $message
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal menyimpan data', 'error' => $e->getMessage()], 500);
        }
    }
    function logout_panitia(Request $request)
    {
        Auth::guard('panitia')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/para-panitia');
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
