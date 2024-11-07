<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wali extends Model
{
    use HasFactory;
    protected $table = 'wali';
    protected $guarded = [];
    public function nis()
    {
        return $this->belongsTo(pendaftar::class, 'nis', 'nis');
    }
    public function a_pend()
    {
        return $this->belongsTo(pendidikan::class, 'a_pend', 'id');
    }
    public function a_ker()
    {
        return $this->belongsTo(pekerjaan::class, 'a_ker', 'id');
    }
    public function a_has()
    {
        return $this->belongsTo(penghasilan::class, 'a_has', 'id');
    }
    public function i_pend()
    {
        return $this->belongsTo(pendidikan::class, 'i_pend', 'id');
    }
    public function i_ker()
    {
        return $this->belongsTo(pekerjaan::class, 'i_ker', 'id');
    }
    public function i_has()
    {
        return $this->belongsTo(penghasilan::class, 'i_has', 'id');
    }
    public function w_ker()
    {
        return $this->belongsTo(pekerjaan::class, 'w_ker', 'id');
    }
    public function w_has()
    {
        return $this->belongsTo(penghasilan::class, 'w_has', 'id');
    }
}
