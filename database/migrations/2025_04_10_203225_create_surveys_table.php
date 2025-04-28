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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('whatsapp');
            $table->string('status');
            $table->tinyInteger('harga_perkilo');
            $table->tinyInteger('harga_sepadan_kualitas');
            $table->tinyInteger('kerapihan');
            $table->tinyInteger('kewangian');
            $table->tinyInteger('kecepatan');
            $table->tinyInteger('rekomendasi');
            $table->tinyInteger('pelayanan');
            $table->tinyInteger('membantu');
            $table->tinyInteger('lokasi');
            $table->tinyInteger('kebersihan_lingkungan');
            $table->text('kritik_saran');
            $table->string('prediksi_kepuasan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
