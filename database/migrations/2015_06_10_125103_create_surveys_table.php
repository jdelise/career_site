<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surveys', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('recruit_id')->unsigned();
            $table->boolean('recruit_show')->default(false);
            $table->boolean('is_employed')->default(false);
            $table->boolean('interviewing_brokerages')->default(false);
            $table->string('brokerage_name')->nullable();
            $table->integer('rating')->default(0);
            $table->timestamp('next_followup_date')->nullable();
            $table->boolean('should_transition_pt_full')->default(false);
            $table->string('recommended_action')->nullable();
            $table->text('comments')->nullable();
            $table->boolean('completed')->default(false);
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
		Schema::drop('surveys');
	}

}
