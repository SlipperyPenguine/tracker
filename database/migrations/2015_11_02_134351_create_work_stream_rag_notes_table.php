<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkStreamRagNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_stream_rag_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('work_stream_id')->unsigned;
            $table->string('rag',1)->default('G');
            $table->text('notes');
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
        Schema::drop('work_stream_rag_notes');
    }
}
