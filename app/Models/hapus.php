<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hapus extends Model
{
    use HasFactory;
    protected $table = 'hapus';
    protected $guarded = [];
    public $timestamps = false;
}
