<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable(false); // Nama lengkap
            $table->string('NIM')->unique(); // NIM mahasiswa
            $table->string('prodi'); // Program Studi
            $table->text('alamat')->nullable(); // Alamat
            $table->string('gambar')->nullable(); // Path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
