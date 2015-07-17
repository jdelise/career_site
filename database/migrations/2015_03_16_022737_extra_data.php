<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtraData extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('extra_data',function(Blueprint $table){
            $table->increments('id');
            $table->integer('blc_id');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip');
            $table->string('source')->nullable();
            $table->string('selling_broker')->nullable();
            $table->string('agent_id');
            $table->timestamps();
            $table->timestamp('closed_date')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('extra_data');
	}

}
