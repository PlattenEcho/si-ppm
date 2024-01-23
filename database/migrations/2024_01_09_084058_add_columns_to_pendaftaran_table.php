<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->string('nim')->after('name');
            $table->string('jenjang')->after('alamat');
            $table->string('surat_pengantar')->after('scan_ktm')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->dropColumn('nim');
            $table->dropColumn('jenjang');
            $table->dropColumn('surat_pengantar');
        });
    }

};
