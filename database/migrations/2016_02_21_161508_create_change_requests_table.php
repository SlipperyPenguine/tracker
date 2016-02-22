<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('external_id');
            $table->string('status')->index();
            $table->string('title')->index();
            $table->integer('subject_id')->unsigned()->index();
            $table->string('subject_type')->index();
            $table->string('subject_name');
            $table->string('sponsor');
            $table->integer('created_by')->unsigned();
            $table->integer('contact')->unsigned()->index();
            $table->dateTime('submission_date');
            $table->dateTime('required_by');
            $table->integer('lead_time')->unsigned();
            $table->dateTime('implementation_date');
            $table->tinyInteger('ranking');
            $table->text('description');
            $table->text('business_benefit');
            $table->text('business_impact');
            $table->text('impact_analysis');

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
        Schema::drop('change_requests');
    }
}
