<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assumptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->unsigned()->index();
            $table->string('subject_type')->index();
            $table->string('subject_name');
            $table->string('status',12);
            $table->integer('created_by')->unsigned();
            $table->integer('owner')->unsigned()->index();
            $table->string('title');
            $table->string('raised')->nullable();
            $table->integer('meeting_id')->nullable()->unsigned();
            $table->text('description');
            $table->dateTime('DueDate');
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
        Schema::drop('assumptions');
    }
}
