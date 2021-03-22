<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInsuranceBasicInsuranceVariableToEmployeeGeneralDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_general_data', function (Blueprint $table) {
            $table->integer('insurance_basic')->nullable()->after('employee_social_insurance_number')->default(0);
            $table->integer('insurance_variable')->nullable()->after('insurance_basic')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_general_data', function (Blueprint $table) {
            //
        });
    }
}
