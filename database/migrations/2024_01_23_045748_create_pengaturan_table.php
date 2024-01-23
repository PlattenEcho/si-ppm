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
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->integer('buka_tidak');
            $table->integer('kuota');
            $table->dateTime('tanggal_buka');
            $table->dateTime('tanggal_tutup');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan');
    }
};
