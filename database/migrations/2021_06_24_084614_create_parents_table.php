<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->bigInteger('parent_relation_id')->unsigned()->nullable();
            $table->string('address')->nullable();
            $table->string('job')->nullable();
            $table->string('nid')->nullable();
            $table->string('nid_issue_place')->nullable();
            $table->dateTime('nid_issue_date',6)->nullable();
            $table->bigInteger('student_id')->unsigned();
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
        Schema::dropIfExists('parents');
    }
}
