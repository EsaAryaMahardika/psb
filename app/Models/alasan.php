<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alasan extends Model
{
    use HasFactory;
    protected $table = 'alasan';
    protected $guarded = [];
    public $timestamps = false;
}
