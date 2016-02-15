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

            $table->boolean('notifyNewTasks')->default(true);
            $table->boolean('notifyNewActions')->default(true);
            $table->boolean('notifyNewRisks')->default(true);

            $table->boolean('notifyChangedTasks')->default(true);
            $table->boolean('notifyChangedActions')->default(true);
            $table->boolean('notifyChangedRisks')->default(true);

            $table->boolean('notifyDueTasks')->default(true);
            $table->boolean('notifyDueActions')->default(true);
            $table->boolean('notifyDueRisks')->default(true);

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
