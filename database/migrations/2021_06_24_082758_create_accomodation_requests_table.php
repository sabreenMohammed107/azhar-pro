<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('accomodation_code')->nullable();
            $table->string('request_no')->nullable();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('education_year_id')->unsigned();
            $table->dateTime('request_date',6)->nullable();
            $table->bigInteger('request_status_id')->unsigned();
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
        Schema::dropIfExists('accomodation_requests');
    }
}
