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
            $table->string('jenjang', 2)->change();
            $table->string('universitas', 50)->change();
            $table->string('no_telp', 15)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->string('jenjang', 255)->change();
            $table->string('universitas', 255)->change();
            $table->string('no_telp', 255)->change();
        });
    }

};
