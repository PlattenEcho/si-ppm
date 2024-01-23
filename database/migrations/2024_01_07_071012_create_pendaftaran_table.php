<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('name');
            $table->string('alamat');
            $table->string('universitas');
            $table->string('email'); // Tambahkan kolom email
            $table->string('no_telp'); // Tambahkan kolom nomor telepon
            $table->unsignedInteger('status_pendaftaran')->default(1);
            $table->text('motivasi');
            $table->text('rencana_kegiatan');
            $table->timestamps();
            $table->string('scan_ktm');

            // Jika menggunakan Laravel 7 ke atas, Anda dapat menambahkan kolom untuk soft deletes
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
}

