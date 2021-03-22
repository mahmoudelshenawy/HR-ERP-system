<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomDelayPenaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_delay_penalties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administration_id');
            $table->foreign('administration_id')->references('id')->on('business_administrations')->onDelete('cascade');           
            $table->char('minute_deduction',10);
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
        Schema::dropIfExists('custom_delay_penalties');
    }
}
