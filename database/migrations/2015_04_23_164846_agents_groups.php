<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgentsGroups extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('agents_groups', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('agent_id')->unsigned();
            $table->integer('group_id')->unsigned();
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
		Schema::drop('agents_groups');
	}

}
