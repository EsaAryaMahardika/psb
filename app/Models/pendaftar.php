<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftar extends Model
{
    use HasFactory;
    protected $table = 'pendaftar';
    protected $fillable = [
        'nis',
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
        'lulus'
    ];
    public $incrementing = false;
    public $timestamps = false;
    public function asrama()
    {
        return $this->belongsTo(asrama::class, 'asr_id', 'id');
    }
    public function prov()
    {
        return $this->belongsTo(provinsi::class, 'prov_id', 'id');
    }
    public function kab()
    {
        return $this->belongsTo(kabupaten::class, 'kab_id', 'id');
    }
    public function kec()
    {
        return $this->belongsTo(kecamatan::class, 'kec_id', 'id');
    }
    public function kel()
    {
        return $this->belongsTo(kelurahan::class, 'kel_id', 'id');
    }
    public function prov_sekolah()
    {
        return $this->belongsTo(provinsi::class, 's_prov', 'id');
    }
    public function kab_sekolah()
    {
        return $this->belongsTo(kabupaten::class, 's_kab', 'id');
    }
    public function kec_sekolah()
    {
        return $this->belongsTo(kecamatan::class, 's_kec', 'id');
    }
}
