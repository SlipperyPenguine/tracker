<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramRagNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
/*        Schema::create('program_rag_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('program_id')->unsigned;
            $table->string('rag',1)->default('G');
            $table->text('notes');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('program_rag_notes');
    }
}
