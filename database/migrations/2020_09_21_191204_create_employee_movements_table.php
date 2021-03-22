<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeMovementsTable extends Migration
{
    public function up()
    {
        Schema::create('employee_movements', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employee_general_data')->onDelete('cascade');
            $table->char('old_branch',5);
            $table->char('new_branch',5);
            $table->char('old_job',5)->nullable();
            $table->char('new_job',5);
            $table->string('movement_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_movements');
    }
}
