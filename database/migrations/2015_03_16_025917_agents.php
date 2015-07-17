<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Agents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agents',function(Blueprint $table){
            $table->integer('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('agent_full_name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('email_address');
            $table->string('mobile_phone');
            $table->string('office_phone')->nullable();
            $table->string('office');
            $table->string('crest_id')->nullable();
            $table->integer('agent_order');
            $table->timestamps();
            $table->primary('id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('agents');
	}

}
