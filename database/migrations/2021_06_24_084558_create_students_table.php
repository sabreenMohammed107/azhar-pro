<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            
            $table->string('mobile')->nullable();
            
            $table->boolean('gender')->nullable();
            $table->dateTime('birth_date',6)->nullable();
            $table->string('birth_place')->nullable();
            $table->string('nid')->nullable();
            $table->string('nid_issue_place')->nullable();
            $table->dateTime('nid_issue_date',6)->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            $table->string('faculty_code')->nullable();
            $table->bigInteger('current_year_id')->unsigned()->nullable();
            $table->bigInteger('division_id')->unsigned()->nullable();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('education_status_id')->unsigned()->nullable();
            $table->bigInteger('current_grade_id')->unsigned()->nullable();
            $table->string('guarantee_grade_img')->nullable();
            $table->string('guarantee_work_img')->nullable();
            $table->string('military_service_complete')->nullable();
            $table->string('punishments')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('students');
    }
}
