<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencePenaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absence_penalties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('business_branches')->onDelete('cascade');
            $table->string('count');
            $table->string('penalty');
            $table->string('max_penalty');
            $table->softDeletes();
            $table->timestamps();
       });
    }


    public function down()
    {
        Schema::dropIfExists('absence_penalties');
    }
}
