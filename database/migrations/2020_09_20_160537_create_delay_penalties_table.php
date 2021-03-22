<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelayPenaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delay_penalties', function (Blueprint $table) {
            $table->id();
            $table->string('delay_minutes');
            $table->string('penalty_first_time');
            $table->string('penalty_second_time');
            $table->string('penalty_third_time');
            $table->string('penalty_fourth_time');
            $table->softDeletes();
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
        Schema::dropIfExists('delay_penalties');
    }
}
