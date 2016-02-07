<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkStreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_streams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id')->unsigned;
            $table->string('phase', 5);
            $table->string('name');
            $table->date('StartDate');
            $table->date('EndDate');
            //$table->tinyInteger('Status')->unsigned->default(0);
            //$table->string('RAG',1)->default('G');
            $table->tinyInteger('status')->unsigned;
            $table->string('RAG',1);
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
        Schema::drop('work_streams');
    }
}
