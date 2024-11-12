<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class track extends Model
{
    use HasFactory;
    protected $table = 'track';
    protected $fillable = [
        'nis',
        'soal1',
        'soal2',
        'soal3',
        'soal4',
        'soal5',
        'soal6',
        'soal7',
        'soal8',
        'soal9',
        'soal10',
        'soal11',
        'soal12',
        'soal13',
        'soal14',
        'soal15',
        'soal16',
        'soal17',
        'soal18',
        'soal19',
        'soal20',
        'soal21',
        'soal22',
        'soal23',
        'soal24',
        'soal25',
        'soal26',
        'soal27',
        'soal28',
        'soal29',
        'soal30',
        'soal31'
    ];
    public $timestamps = false;
    public function nis()
    {
        return $this->belongsTo(pendaftar::class, 'nis', 'nis');
    }
}
