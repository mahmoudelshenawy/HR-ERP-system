<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeCostadiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_custodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('id')->references('id')->on('employee_general_data')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('custody_type_id');
            $table->foreign('custody_type_id')->references('id')->on('custody_types')->onDelete('cascade');
            $table->string('custody_number')->nullable();
            $table->char('name'   ,50);
            $table->string('custody_data')->nullable();
            $table->string('custody_received_date')->nullable();
            $table->string('custody_checking_date')->nullable();
            $table->string('custody_insurance_expiry_date')->nullable();
            $table->string('custody_expiry_form_date')->nullable();
            $table->string('custody_return_date')->nullable();
            $table->enum('statue',['active','returned','losted','purchased'])->default('active');
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
        Schema::dropIfExists('employee_costadies');
    }
}
