<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\provinsi;
use App\Models\kabupaten;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\pendaftar;
use App\Models\role;
use App\Models\soal;
use App\Models\track;
use App\Models\hapus;

class DBController extends Controller
{
    function index(){
        return view('index');
    }
    public function login(Request $request)
    {
        $credentials = [
            'nik' => $request->nik,
            'password' => $request->password
        ];
 
        if (Auth::guard('pendaftar')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('form-pendaftar');
        }
        dd('Salah password');
    }
    function panitia() {
        return view('layout.panitia');
    }
    function form() {
        $nama = Auth::user()->nama;
        $nik = Auth::user()->nik;
        return view('pendaftar/form', compact('nama', 'token', 'nik'));
    }
    function u_pendaftar($id) {
        
    }
    function d_pendaftar(Request $Request, $id) {
        
    }
    function hapus() {
        
    }
    function d_hapus(Request $Request, $id) {
        
    }
    function token() {
        
    }
    function u_token($id) {
        
    }
    function verify($id) {
        
    }
    function d_token($id) {
        
    }
    function pengasuh() {
        
    }
    function detail() {
        
    }
}
