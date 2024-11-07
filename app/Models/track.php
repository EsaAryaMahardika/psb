<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class track extends Model
{
    use HasFactory;
    protected $table = 'track';
    protected $guarded = [];
    public function nis()
    {
        return $this->belongsTo(pendaftar::class, 'nis', 'nis');
    }
}
