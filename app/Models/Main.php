<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Main extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'NIM',
        'kelas',
        'prodi',
        'alamat',
        'no_telpon',
    ];
}
