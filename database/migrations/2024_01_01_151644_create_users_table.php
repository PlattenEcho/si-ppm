<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->boolean('profile_completed')->default(false);
            $table->unsignedInteger('idrole'); // Assuming a foreign key to a roles table
            $table->string('foto')->nullable(); // Assuming the 'foto' column can be nullable

            // Foreign key constraint
            $table->foreign('idrole')->references('idrole')->on('roles');

            // Indexes or unique constraints can be added as needed
            // $table->index('username');
            // $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
