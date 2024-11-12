<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wali extends Model
{
    use HasFactory;
    protected $table = 'wali';
    protected $fillable = [
        'nis',
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
    ];
    public $timestamps = false;
    public function nis()
    {
        return $this->belongsTo(pendaftar::class, 'nis', 'nis');
    }
    public function pend_ayah()
    {
        return $this->belongsTo(pendidikan::class, 'a_pend', 'id');
    }
    public function ker_ayah()
    {
        return $this->belongsTo(pekerjaan::class, 'a_ker', 'id');
    }
    public function has_ayah()
    {
        return $this->belongsTo(penghasilan::class, 'a_has', 'id');
    }
    public function pend_ibu()
    {
        return $this->belongsTo(pendidikan::class, 'i_pend', 'id');
    }
    public function ker_ibu()
    {
        return $this->belongsTo(pekerjaan::class, 'i_ker', 'id');
    }
    public function has_ibu()
    {
        return $this->belongsTo(penghasilan::class, 'i_has', 'id');
    }
    public function ker_wali()
    {
        return $this->belongsTo(pekerjaan::class, 'w_ker', 'id');
    }
    public function has_wali()
    {
        return $this->belongsTo(penghasilan::class, 'w_has', 'id');
    }
}
