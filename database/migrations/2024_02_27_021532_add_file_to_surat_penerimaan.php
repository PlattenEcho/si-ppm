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
        Schema::table('surat_penerimaan', function (Blueprint $table) {
            $table->string('file')->after('tanggal_surat_magang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat_penerimaan', function (Blueprint $table) {
            $table->dropColumn('file');
        });
    }
};
