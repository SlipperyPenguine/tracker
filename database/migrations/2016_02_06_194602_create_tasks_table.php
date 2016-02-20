<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->unsigned()->index();
            $table->string('subject_type')->index();
            $table->string('subject_name');
            $table->string('status',12);
            $table->integer('created_by')->unsigned;
            $table->integer('action_owner')->nullable();
            $table->string('title');
            $table->text('description');
            $table->boolean('milestone');
            $table->dateTime('StartDate');
            $table->dateTime('EndDate')->nullable();
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
        Schema::drop('tasks');
    }
}
