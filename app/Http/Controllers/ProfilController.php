<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::all();
        $penyewaans = Penyewaan::with(['pelanggan', 'kendaraan'])->get();
        $pembayarans = Pembayaran::with(['penyewaan.pelanggan'])->get();
        return view('index', compact('profils', 'penyewaan', 'pembayaran'));
    }

    public function create()
    {
        return view('profils.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'NIM' => 'required|string|max:15|unique:profils,NIM',
            'prodi' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('gambar_profils', 'public');
            $validated['gambar'] = $path;
        }

        Profil::create($validated);

        return redirect()->route('index')->with('success', 'Profil berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $profil = Profil::findOrFail($id); // Ambil data profil berdasarkan ID
        return view('profils.edit', compact('profil')); // Tampilkan halaman edit
    }

    public function update(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'NIM' => 'required|string|max:15|unique:profils,NIM,' . $profil->id,
            'prodi' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($profil->gambar) {
                \Storage::disk('public')->delete($profil->gambar);
            }
            // Simpan gambar baru
            $path = $request->file('gambar')->store('gambar_profils', 'public');
            $validated['gambar'] = $path;
        }

        $profil->update($validated);

        return redirect()->route('index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);

        // Hapus gambar jika ada
        if ($profil->gambar) {
            \Storage::disk('public')->delete($profil->gambar);
        }

        $profil->delete();

        return redirect()->route('index')->with('success', 'Profil berhasil dihapus.');
    }
}
