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
        Schema::create('hasil_prediksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_sosmed')->unsigned()->nullable();
            $table->bigInteger('id_keuntungan')->unsigned()->nullable();
            $table->bigInteger('id_pengaruh_event')->unsigned()->nullable();
            $table->bigInteger('id_kenaikan_kuntungan')->unsigned()->nullable();
            $table->bigInteger('id_produk')->unsigned()->nullable();
            $table->bigInteger('id_waktu')->unsigned()->nullable();
            $table->bigInteger('id_hasil')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_prediksi');
    }
};
