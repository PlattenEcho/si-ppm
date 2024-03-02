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
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->string('program_studi')->nullable(false)->change();
            $table->date('tanggal_mulai')->nullable(false)->change();
            $table->date('tanggal_akhir')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->string('program_studi')->nullable()->change();
            $table->date('tanggal_mulai')->nullable()->change();
            $table->date('tanggal_akhir')->nullable()->change();
        });
    }
};
