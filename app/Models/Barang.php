<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'harga', 'stok', 'pemasok_id'];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }
}
