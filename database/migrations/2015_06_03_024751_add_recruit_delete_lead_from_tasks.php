<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecruitDeleteLeadFromTasks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('tasks', function(Blueprint $table)
        {
            $table->integer('recruit_id');
            $table->dropColumn('lead_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('tasks', function(Blueprint $table)
        {
            $table->dropColumn('recruit_id');
            $table->integer('lead_id');
        });
	}

}
