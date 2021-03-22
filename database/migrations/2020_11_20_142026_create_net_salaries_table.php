<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('net_salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employee_general_data')->onDelete('cascade');
            $table->integer('month');
            $table->integer('basic_salary')->default(0);
            $table->integer('variable_salary')->default(0);
            $table->integer('insurance_basic')->default(0);
            $table->integer('insurance_variable')->default(0);
            $table->integer('overtime')->default(0);
            $table->integer('allowance')->default(0);
            $table->integer('advance')->default(0);
            $table->integer('commission')->default(0);
            $table->integer('delay_penalty')->default(0);
            $table->integer('absence_penalty')->default(0);
            $table->integer('employee_allowance')->default(0);
            $table->integer('employee_deduction')->default(0);
            $table->integer('net_salary')->default(0);
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
        Schema::dropIfExists('net_salaries');
    }
}
