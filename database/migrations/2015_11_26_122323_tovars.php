<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tovars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tovars', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->text('description');
      $table->string('preview');
      $table->decimal('price', 10,2); //ограничем ценник 8 значным числом с копейками
      $table->integer('category');
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
       Schema::drop('tovars');
    }
}
