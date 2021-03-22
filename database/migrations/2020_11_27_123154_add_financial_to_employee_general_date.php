<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFinancialToEmployeeGeneralDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_general_data', function (Blueprint $table) {
            $table->integer('housing_allowance')->default(0)->after('employee_bank_account_name');
            $table->integer('clothing_allowance')->default(0)->after('housing_allowance');
            $table->integer('food_allowance')->default(0)->after('clothing_allowance');
            $table->integer('mobile_allowance')->default(0)->after('food_allowance');
            $table->integer('gas_allowance')->default(0)->after('mobile_allowance');
            $table->integer('car_allowance')->default(0)->after('gas_allowance');
            $table->integer('insurance_deduct')->default(0)->after('gas_allowance');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empolyee_general_data', function (Blueprint $table) {
            //
        });
    }
}
