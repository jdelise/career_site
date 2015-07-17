<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGoalColumnsTUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function(Blueprint $table)
        {
            $table->integer('experienced_agent_goal')->unsigned()->nullable();
            $table->integer('new_agent_goal')->unsigned()->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('experienced_agent_goal');
            $table->dropColumn('new_agent_goal');
        });
	}

}
