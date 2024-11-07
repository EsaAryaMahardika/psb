<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model
use Illuminate\Foundation\Auth\User as Model;

class pendaftar extends Model
{
    use HasFactory;
    protected $table = 'pendaftar';
    protected $fillable = ['nik', 'password'];
    public $incrementing = false;
    public $timestamps = false;
    public function asrama()
    {
        return $this->belongsTo(asrama::class, 'asr_id', 'id');
    }
    public function jenjang()
    {
        return $this->belongsTo(jenjang::class, 'jen_id', 'id');
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
        return $this->belongsTo(kelurahan::class, 'kec_id', 'id');
    }
    public function survey()
    {
        return $this->belongsTo(survey::class, 'survey_id', 'id');
    }
}
