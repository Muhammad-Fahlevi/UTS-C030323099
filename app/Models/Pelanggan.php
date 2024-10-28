<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    // Relasi satu ke banyak dengan Penyewaan
    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class, 'id_pelanggan');
    }
}
