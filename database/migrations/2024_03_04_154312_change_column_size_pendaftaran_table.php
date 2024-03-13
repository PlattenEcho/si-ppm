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
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->string('name', 50)->change();
            $table->string('nim', 50)->change();
            $table->string('program_studi', 50)->change();
            $table->string('email', 50)->change();
        });

        Schema::table('surat_penerimaan', function (Blueprint $table) {
            $table->string('nomor_surat', 50)->change();
            $table->string('kepada', 50)->change();
            $table->string('fakultas_instansi', 50)->change();
            $table->string('no_surat_magang', 50)->change();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->string('name', 255)->change();
            $table->string('nim', 255)->change();
            $table->string('program_studi', 255)->change();
            $table->string('email', 255)->change();
        });

        Schema::table('surat_penerimaan', function (Blueprint $table) {
            $table->string('nomor_surat', 255)->change();
            $table->string('kepada', 255)->change();
            $table->string('fakultas_instansi', 255)->change();
            $table->string('no_surat_magang', 255)->change();
        });
    }
};
