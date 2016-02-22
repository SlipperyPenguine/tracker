<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->unsigned()->index();
            $table->string('subject_type')->index();
            $table->string('subject_name');
            $table->integer('dependent_on_id')->unsigned()->index();
            $table->string('dependent_on_type')->index();
            $table->string('dependent_on_name');
            $table->boolean('unlinked');
            $table->string('status',12);
            $table->integer('created_by')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->dateTime('NextReviewDate');
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
        Schema::drop('dependencies');
    }
}
