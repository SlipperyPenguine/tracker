<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkStreamRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_stream_risks', function (Blueprint $table) {
/*            $table->increments('id');
            $table->integer('work_stream_id')->unsigned;
            $table->string('status',12)->default('open');
            $table->tinyInteger('probability')->default(5);
            $table->tinyInteger('severity')->default(5);
            $table->boolean('is_an_issue')->default(false);
            $table->dateTime('NextReviewDate')->nullable;
            $table->integer('owner')->unsigned;
            $table->integer('action_owner')->unsigned->nullable;
            $table->string('title');
            $table->text('description');
            $table->string('mitigation_strategy')->default('Accept');
            $table->text('mitigation_approach')->nullable;
            $table->timestamps();*/

            $table->increments('id');
            $table->integer('work_stream_id')->unsigned;
            $table->string('status',12);
            $table->tinyInteger('probability');
            $table->tinyInteger('severity');
            $table->boolean('is_an_issue');
            $table->dateTime('NextReviewDate')->nullable;
            $table->integer('owner')->unsigned;
            $table->integer('action_owner')->nullable;
            $table->string('title');
            $table->text('description');
            $table->string('mitigation_strategy');
            $table->text('mitigation_approach')->nullable;
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
        Schema::drop('work_stream_risks');
    }
}
