<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClosedPriceToExtraData extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //
        Schema::table('extra_data', function(Blueprint $table)
        {
            $table->decimal('closed_price')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('extra_data', function(Blueprint $table){
            $table->dropColumn('closed_price');
        });
	}

}
