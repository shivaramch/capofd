<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInjuriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('injuries', function (Blueprint $table) {
            $table->increments('ofd6id');
            $table->string('reportnum', 256)->nullable();
            $table->date('injurydate')->nullable();
            $table->date('createdate')->nullable();
            $table->string('injuredemployeename', 256)->nullable();
            $table->string('injuredemployeeid', 256)->nullable();
            $table->string('assignmentinjury', 256)->nullable();
            $table->string('corvelid', 256)->nullable();
            $table->string('captainid', 256)->nullable();
            $table->string('battalionchiefid', 256)->nullable();
            $table->string('aconduty', 256)->nullable();
            $table->string('shift', 256)->nullable();
            $table->string('frmsincidentnum', 256)->nullable();
            $table->string('documentworkforce', 256)->nullable();
            $table->string('documentoperationalday', 256)->nullable();
            $table->string('trainingassigned', 256)->nullable();
            $table->string('policeofficercompletesign', 256)->nullable();
            $table->string('callsupervisor', 256)->nullable();
            $table->string('createdby', 256)->nullable();
            $table->string('updatedby', 256)->nullable();
            $table->integer('applicationstatus')->nullable();
            $table->string('checkbox1')->nullable();
            $table->string('checkbox2')->nullable();
            $table->string('checkbox3')->nullable();
            $table->string('checkbox4')->nullable();
            $table->string('checkbox5')->nullable();
            $table->timestamps();
            $table->ipAddress('ip_address', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('injuries');
    }
}
