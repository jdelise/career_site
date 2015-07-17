<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAgentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('agents',function(Blueprint $table){
            $table->string('days_red')->default('1');
            $table->boolean('is_test')->default(0);
            $table->boolean('is_active')->default(0);
            $table->boolean('is_team_leader')->default(0);
            $table->string('team_name')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('agents',function(Blueprint $table){
            $table->dropColumn(['days_red', 'is_test', 'is_active','is_team_leader','team_name']);
        });
	}

}
