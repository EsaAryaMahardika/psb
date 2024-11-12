<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penghasilan extends Model
{
    use HasFactory;
    protected $table = 'penghasilan';
    protected $guarded = [];
    public $timestamps = false;
}
