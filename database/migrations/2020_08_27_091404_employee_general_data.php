<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeGeneralData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_general_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code')->unique();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('business_branches')->onDelete('cascade');
            $table->string('employee_img',255)->nullable();
            $table->string('employee_name',255);
            $table->string('employee_name_en',255)->nullable();
            $table->string('employee_short_name',255)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->char('email',50)->nullable();
            $table->char('phone_1',20)->nullable();
            $table->char('phone_2',20)->nullable();
            $table->char('address',100)->nullable();
            $table->char('religion',10)->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('birth_place',30)->nullable();
            $table->char('birth_date',15)->nullable();
            $table->unsignedBigInteger('guarantor_id')->nullable();
            $table->foreign('guarantor_id')->references('id')->on('guarantors')->onDelete('cascade');
            $table->char('passport_number',25)->nullable();
            $table->char('passport_start_date',15)->nullable();
            $table->char('passport_expiry_date',15)->nullable();
            $table->string('passport_file',255)->nullable();
            $table->char('national_id_number',25)->nullable();
            $table->char('national_id_expiry_date',15)->nullable();
            $table->string('national_id_file')->nullable();
            $table->char('residency_number',25)->nullable();
            $table->char('residency_start_date',15)->nullable();
            $table->char('residency_expiry_date',15)->nullable();
            $table->string('residency_file',100)->nullable();
            $table->char('residency_job',25)->nullable();
            $table->char('driving_licence_number',25)->nullable();
            $table->char('driving_licence_expiry_date',15)->nullable();
            $table->char('driving_licence_file',100)->nullable();
            $table->char('healthy_certificate',25)->nullable();
            $table->string('healthy_certificate_notice')->nullable();
            $table->char('healthy_certificate_expiry_date',15)->nullable();
            $table->string('healthy_certificate_file',100)->nullable();
            $table->char('educational_qualification',50)->nullable();
            $table->char('educational_university',50)->nullable();
            $table->char('educational_qualification_year',15)->nullable();
            $table->string('educational_qualification_file',250)->nullable();
            $table->text('experience')->nullable(); $table->string('cv',100)->nullable();
            $table->unsignedBigInteger('job_id')->nullable();
            $table->foreign('job_id')->references('id')->on('business_jobs')->onDelete('cascade');
            $table->unsignedBigInteger('contract_types_id')->nullable();
            $table->foreign('contract_types_id')->references('id')->on('contract_types')->onDelete('cascade');
            $table->char('hiring_date',15)->nullable();
            $table->char('contract_starting_date',15)->nullable();
            $table->char('contract_ending_date',15)->nullable();
            $table->bigInteger('manager_id')->nullable();
            $table->integer('basic_salary')->nullable();
            $table->integer('variable_pay')->nullable();
            $table->boolean('annual_vacation')->nullable()->default(0);
            $table->integer('annual_vacation_days_per_year')->nullable();
            $table->boolean('end_service_reward')->nullable()->default(0);
            $table->integer('end_service_reward_days_per_year')->nullable();
            $table->boolean('attendable')->nullable();
            $table->boolean('employee_medical_insurance_statue')->nullable()->default(0);
            $table->unsignedBigInteger('medical_insurance_id')->nullable();
            $table->foreign('medical_insurance_id')->references('id')->on('medical_insurances')->onDelete('cascade');
            $table->integer('medical_insurance_number')->nullable();
            $table->char('medical_insurance_type','50')->nullable();
            $table->char('medical_insurance_start_data',15)->nullable();
            $table->char('medical_insurance_end_data',15)->nullable();
            $table->boolean('employee_social_insurance_statue')->nullable()->default(0);
            $table->integer('employee_social_insurance_number')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('bank_data')->onDelete('cascade')->cascadeOnUpdate();
            $table->bigInteger('employee_account_number')->nullable();
            $table->char('employee_bank_account_name',50)->nullable();
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
        Schema::dropIfExists('employee_general_data');

    }
}
