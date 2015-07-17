<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLastFollowUpDateToRecruits extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::table('recruits', function(Blueprint $table)
        {
            $table->timestamp('last_follow_up_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recruits', function(Blueprint $table){
            $table->dropColumn('last_follow_up_date');
        });
    }

}
