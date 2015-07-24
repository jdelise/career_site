<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBrokerFieldFromLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::table('leads', function(Blueprint $table)
        {
            $table->dropColumn('brokerage_name');
            $table->string('brokerage_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function(Blueprint $table)
        {
            $table->dropColumn('brokerage_code');
            $table->string('brokerage_name');
        });
    }

}
