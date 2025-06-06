<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Barang;

class Pemasok extends Model
{
    protected $fillable = ['nama', 'telepon', 'alamat'];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
