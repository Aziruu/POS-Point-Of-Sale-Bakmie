<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bakmie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'stok',
    ];
}
