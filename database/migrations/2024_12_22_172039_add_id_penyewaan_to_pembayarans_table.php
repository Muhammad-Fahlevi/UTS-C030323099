<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPenyewaanToPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_penyewaan');  // Menambahkan kolom id_penyewaan
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
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropForeign(['id_penyewaan']);
            $table->dropColumn('id_penyewaan');
        });
    }
}
