<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function store(Request $request)
    {
        Penyewaan::create($request->all());
        return redirect()->back()->with('success', 'Penyewaan berhasil ditambahkan!');
    }
};