<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_pendaftaran', function (Blueprint $table) {
            $table->id('id_history'); // Ubah id menjadi id_history
            $table->unsignedBigInteger('id_pendaftaran');
            $table->integer('status_pendaftaran');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pendaftaran');
    }
};
