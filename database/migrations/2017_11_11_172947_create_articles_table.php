<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('make');
            $table->string('ABC', 1);
            $table->string('um');
            $table->integer('stockmin')->unsigned();
            $table->integer('stockmax')->unsigned();
            $table->integer('residue')->unsigned();
            $table->string('status')->default('Pedir');
            $table->integer('provider_id')->unsigned();
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
        Schema::dropIfExists('articles');
    }
}
