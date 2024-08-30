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
        Schema::create('datalatih', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_biodata')->unsigned()->nullable();
            $table->string('sosmed'); 
            $table->string('keuntungan');
            $table->string('pengaruh event');
            $table->string('produk');
            $table->date('waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datalatih');
    }
};
