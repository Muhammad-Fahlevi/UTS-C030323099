<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kendaraan');
            $table->string('id_pelanggan');
            $table->timestamps();

            $table->foreign('id_kendaraan')->references('id')->on('kendaraans')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('email')->on('pelanggans')->onDelete('cascade');
        });
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_penyewaan');  // Tambahkan kolom id_penyewaan
            $table->foreign('id_penyewaan')->references('id')->on('penyewaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penyewaans', function (Blueprint $table) {
            // Menghapus foreign key sebelum menghapus tabel
            $table->dropForeign(['id_kendaraan']);
            $table->dropForeign(['id_pelanggan']);
        });

        // Hapus tabel setelah foreign key dihapus
        Schema::dropIfExists('penyewaans');
    }
};