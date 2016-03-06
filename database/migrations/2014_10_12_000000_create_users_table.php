<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('name');
            $table->boolean('superUser')->default(false);

            $table->boolean('notifyNewTasks')->default(false);
            $table->boolean('notifyNewActions')->default(false);
            $table->boolean('notifyNewRisks')->default(false);

            $table->boolean('notifyChangedTasks')->default(false);
            $table->boolean('notifyChangedActions')->default(false);
            $table->boolean('notifyChangedRisks')->default(false);

            $table->boolean('notifyDueTasks')->default(false);
            $table->boolean('notifyDueActions')->default(false);
            $table->boolean('notifyDueRisks')->default(false);

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
