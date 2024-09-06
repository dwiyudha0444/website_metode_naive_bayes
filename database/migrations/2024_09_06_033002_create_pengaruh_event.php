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
        Schema::create('pengaruh_event', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_prediksi')->unsigned()->nullable();
            $table->string('nama');
            $table->decimal('b', 16, 2);
            $table->decimal('tb', 16, 2);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaruh_event');
    }
};
