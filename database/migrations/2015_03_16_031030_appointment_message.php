<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppointmentMessage extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointment_message',function(Blueprint $table){
            $table->increments('id');
            $table->integer('lead_id');
            $table->integer('responses');
            $table->integer('agent_id');
            $table->integer('zipcode');
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
		Schema::drop('appointment_message');
	}

}
