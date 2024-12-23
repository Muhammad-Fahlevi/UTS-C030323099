<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function store(Request $request)
    {
        Pelanggan::create($request->all());
        return redirect()->back()->with('success', 'Pelanggan berhasil ditambahkan!');
    }
}
