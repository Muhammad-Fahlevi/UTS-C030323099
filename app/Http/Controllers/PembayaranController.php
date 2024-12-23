<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Proses upload gambar ke folder 'public/galeri'
        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('galeri', 'public');
        }

        // Simpan data pembayaran tanpa menyimpan path gambar
        Pembayaran::create([
            'id_penyewaan' => $request->id_penyewaan,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => $request->status,
            // Tidak menyimpan 'bukti_pembayaran' di database
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil dikirim.');
    }
}
