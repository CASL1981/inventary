<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('cc', 20)->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->enum('role', ['admin', 'edit', 'normal'])->default('normal');
            $table->string('email')->unique();
            $table->enum('area', ['administracion', 'comercial', 'farmacia']);
            $table->string('nick')->unique();
            $table->string('password');
            $table->string('avatar');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
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
