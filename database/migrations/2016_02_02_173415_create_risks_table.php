<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('subject_id')->unsigned()->index();
            $table->string('subject_type')->index();
            $table->string('subject_name');
            $table->string('status',12);
            $table->tinyInteger('probability');
            $table->tinyInteger('previous_probability')->nullable();
            $table->tinyInteger('impact');
            $table->tinyInteger('previous_impact')->nullable();
            $table->tinyInteger('target_probability')->nullable();
            $table->tinyInteger('target_impact')->nullable();
            $table->boolean('is_an_issue');
            $table->dateTime('NextReviewDate')->nullable;
            $table->integer('owner')->unsigned;
            $table->integer('action_owner')->nullable;
            $table->string('title');
            $table->text('description');
            $table->string('response_strategy')->nullable;;
            $table->text('response_notes')->nullable;
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
        Schema::drop('risks');
    }
}
