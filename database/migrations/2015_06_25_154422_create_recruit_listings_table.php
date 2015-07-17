<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recruit_listings', function(Blueprint $table)
		{
			$table->integer('id');
            $table->timestamp('OriginalEntryTimestamp');
            $table->timestamp('PendingDate')->nullable();
            $table->timestamp('CloseDate')->nullable();
            $table->decimal('ClosePrice')->nullable();
            $table->string('ListAgentMLSID')->nullable();
            $table->string('SellingAgentMLSID')->nullable();
            $table->decimal('ListPrice')->nullable();
            $table->integer('CDOM')->nullable();
            $table->string('StreetName')->nullable();
            $table->string('StreetNumber')->nullable();
            $table->string('City')->nullable();
            $table->string('ZipCode')->nullable();
            $table->string('Status')->nullable();
            $table->string('PropertySubType')->nullable();
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
		Schema::drop('recruit_listings');
	}

}
