<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pekerjaan';
    protected $guarded = [];
    public $timestamps = false;
}
