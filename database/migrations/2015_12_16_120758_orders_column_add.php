<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersColumnAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function($table)
          {
              $table->string('city');
              $table->string('time1');
              $table->string('time2');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function($table)
           {
              $table->dropColumn(['city', 'time1', 'time2']);
           });
    }
}
