<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            //$table->tinyInteger('Status')->unsigned->default(0);
            //$table->string('RAG')->default('G');
            $table->tinyInteger('Status')->unsigned;
            $table->string('RAG');
            $table->string('description')->nullable;
            $table->date('StartDate');
            $table->date('EndDate');
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
        Schema::drop('programs');
    }
}
