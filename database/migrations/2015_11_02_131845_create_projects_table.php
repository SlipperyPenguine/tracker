<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id')->unsigned()->indexed();
            $table->integer('work_stream_id')->unsigned()->indexed();
            $table->string('name');
            $table->tinyInteger('Status')->unsigned(); //0=Pre Gate 1, 1 = Concept paper approved past gate 1, 2= architecture approval past R1, 3= G2 approved, 4=G3 approved go live, 5 = closed, 6=cancelled
            $table->string('PI',10);
            $table->date('StartDate');
            $table->date('EndDate');
            $table->string('description')->nullable;
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
        Schema::drop('projects');
    }
}
