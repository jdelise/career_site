<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recruits', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('mls_id')->unsigned()->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_1_type')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('phone_2_type')->nullable();
            $table->string('status')->nullable();
            $table->string('user_id')->nullable();
            $table->string('source')->nullable();
            $table->string('deleted')->nullable();
            $table->string('referred_by')->nullable();
            $table->integer('member_id')->nullable();
            $table->string('is_hired')->nullable();
            $table->string('birthday')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('brokerage_code')->nullable();
            $table->string('hot_list')->nullable();
            $table->boolean('synced')->default(false);
            $table->string('real_estate_school')->nullable();
            $table->string('experience_level')->nullable();
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
		Schema::drop('recruits');
	}

}
