<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraans';
    protected $fillable = [
        'jenis_kendaraan', // Tambahkan ini
        'plat_nomor',
        'harga_sewa',
        // Tambahkan atribut lain yang diperlukan
    ];

    // Relasi satu ke banyak dengan Penyewaan
    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class, 'id_kendaraan');
    }
}
