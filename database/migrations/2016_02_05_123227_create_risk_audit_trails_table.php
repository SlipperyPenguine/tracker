<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiskAuditTrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_audit_trails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->indexed()->unsigned();
            $table->integer('risk_id')->indexed()->unsigned();
            $table->text('before');
            $table->text('after');

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
        Schema::drop('risk_audit_trails');
    }
}
