<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrival extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_maskapai',
        'id_penerbangan',
        'dari',
        'waktu',
    ];
}
