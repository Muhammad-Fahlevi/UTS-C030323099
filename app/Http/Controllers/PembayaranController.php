<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Penyewaan;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_penyewaan' => 'required|exists:penyewaans,id', // Pastikan id_penyewaan valid
            'jumlah_bayar' => 'required|numeric',
            'tanggal_pembayaran' => 'required|date',
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi bukti pembayaran (optional)
        ]);

        // Proses upload gambar ke folder 'public/galeri'
        $bukti_pembayaran = null;
        if ($request->hasFile('bukti_pembayaran')) {
            // Simpan file di folder 'public/galeri' dan dapatkan path-nya
            $bukti_pembayaran = $request->file('bukti_pembayaran')->store('public/galeri');
        }

        // Simpan data pembayaran
        Pembayaran::create([
            'id_penyewaan' => $request->id_penyewaan,
            'metode_pembayaran' => $request->metode_pembayaran, // Pastikan ini ada
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jumlah_bayar' => $request->jumlah_bayar,
            'status' => $request->status ?? 'pending', // Menggunakan status default jika tidak ada
            'bukti_pembayaran' => $bukti_pembayaran, // Menyimpan path bukti pembayaran
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pembayaran berhasil dikirim.');
    }
}
