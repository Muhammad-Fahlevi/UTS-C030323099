<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Kolom-kolom yang dapat diisi menggunakan mass assignment
    protected $fillable = [
        'id_penyewaan',  // Tambahkan id_penyewaan di sini
        'jumlah_pembayaran', // Kolom lain yang relevan
        'tanggal_pembayaran', // Kolom lain yang relevan
        // Kolom-kolom lainnya jika ada
    ];

    // Relasi dengan model Penyewaan
    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class, 'id_penyewaan');
    }
}
