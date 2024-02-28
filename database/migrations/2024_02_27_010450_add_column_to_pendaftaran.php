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
            $table->string('program_studi')->default('no')->after('universitas');
            $table->date('tanggal_mulai')->default(now())->after('rencana_kegiatan');
            $table->date('tanggal_akhir')->default(now()->addDays(60))->after('tanggal_mulai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->dropColumn(['program_studi', 'tanggal_mulai', 'tanggal_akhir']);
        });
    }
};
