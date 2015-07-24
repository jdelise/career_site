<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePhoneFieldFromLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::table('leads', function(Blueprint $table)
        {
            $table->dropColumn('phone');
            $table->string('phone_1')->nullable();
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
            $table->dropColumn('phone_1');
            $table->string('phone');
        });
    }

}
