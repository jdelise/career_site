<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipcodes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zipcodes',function(Blueprint $table){
            $table->integer('zipcode');
            $table->primary('zipcode');
            $table->string('city')->nullable();
            $table->integer('min_closings')->default(1);
            $table->integer('min_red')->default(50);
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
		Schema::drop('zipcodes');
	}

}
