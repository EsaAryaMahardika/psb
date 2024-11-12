<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;

use function Laravel\Prompts\password;

class token extends Model
{
    use HasFactory;
    protected $table = 'token';
    protected $fillable = [
        'nis',
        'nama',
        'id',
        'kelamin',
        'wa',
        'jenjang_id',
        'survey_id',
        'password',
        'token'
    ];
    public $timestamps = false;
    public function data()
    {
        return $this->belongsTo(pendaftar::class, 'nis', 'nis');
    }
    public function wali()
    {
        return $this->belongsTo(wali::class, 'nis', 'nis');
    }
    public function survey()
    {
        return $this->belongsTo(survey::class, 'survey_id', 'id');
    }
    public function jenjang()
    {
        return $this->belongsTo(jenjang::class, 'jenjang_id', 'id');
    }
}
