<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('leads', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->string('user_id')->nullable();
            $table->string('source')->nullable();
            $table->string('brokerage_name')->nullable();
            $table->string('experience_level')->nullable();
            $table->string('real_estate_school')->nullable();
            $table->text('note')->nullable();
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
        Schema::drop('leads');
    }

}
