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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penyewaan')->constrained('penyewaans')->onDelete('cascade'); // Relasi ke penyewaan
            $table->string('metode_pembayaran')->default('Transfer')->change();
            $table->decimal('jumlah_bayar', 10, 2)->default(0);
            $table->string('bukti_pembayaran')->nullable(); // Menyimpan path bukti pembayaran
            $table->enum('status', ['pending', 'lunas'])->default('pending'); // Status pembayaran
            $table->date('tanggal_pembayaran')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};