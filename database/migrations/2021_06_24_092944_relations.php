<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
          //  This is Realations for the leaves_requests Table ..
          Schema::table('leaves_requests', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students'); 
            $table->foreign('education_year_id')->references('id')->on('education_years'); 
            $table->foreign('request_status_id')->references('id')->on('requests_statuses'); 
        });
            //  This is Realations for the accomodation_requests Table ..
            Schema::table('accomodation_requests', function (Blueprint $table) {
                $table->foreign('student_id')->references('id')->on('students'); 
                $table->foreign('education_year_id')->references('id')->on('education_years'); 
                $table->foreign('request_status_id')->references('id')->on('requests_statuses'); 
            });
             //  This is Realations for the students Table ..
             Schema::table('students', function (Blueprint $table) {
                $table->foreign('city_id')->references('id')->on('cities'); 
                $table->foreign('faculty_id')->references('id')->on('faculties'); 
                $table->foreign('user_id')->references('id')->on('users'); 
                $table->foreign('current_year_id')->references('id')->on('education_years'); 
                $table->foreign('division_id')->references('id')->on('divisions'); 
                $table->foreign('department_id')->references('id')->on('departments'); 
                $table->foreign('education_status_id')->references('id')->on('requests_statuses'); 
                $table->foreign('current_grade_id')->references('id')->on('grades'); 
            });
            //  This is Realations for the parents Table ..
        Schema::table('parents', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('parent_relation_id')->references('id')->on('parent_relations'); 
        });

        //  This is Realations for the rooms Table ..
        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('building_id')->references('id')->on('buildings'); 
        });
        //  This is Realations for the students_rooms Table ..
        Schema::table('students_rooms', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students'); 
            $table->foreign('room_id')->references('id')->on('rooms'); 
            $table->foreign('education_year_id')->references('id')->on('education_years'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
