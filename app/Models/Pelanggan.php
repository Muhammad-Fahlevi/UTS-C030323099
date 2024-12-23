<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    // Menentukan primary key adalah email
    protected $primaryKey = 'email';

    // Primary key bukan auto increment
    public $incrementing = false;

    // Primary key bertipe string
    protected $keyType = 'string';

    // Kolom yang dapat diisi
    protected $fillable = [
        'email',        // Primary key
        'nama',         // Nama pelanggan
        'no_telepon',   // Nomor telepon pelanggan
        'alamat',       // Alamat pelanggan
        'tanggal_lahir' // Tanggal lahir pelanggan (opsional)
    ];

    // Relasi satu ke banyak dengan Penyewaan
    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class, 'id_pelanggan', 'email');
    }
}
