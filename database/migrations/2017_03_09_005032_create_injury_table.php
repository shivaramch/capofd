<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInjuryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('injury', function (Blueprint $table) {
            $table->increments('ofd6id');
            $table->string('reportnum', 256);
            $table->date('injurydate');
            $table->string('injuredemployeename', 256);
            $table->string('injuredemployeeid', 256);
            $table->string('assignmentinjury', 256);
            $table->string('corvelid', 256);
            $table->string('captainid', 256);
            $table->string('battalionchiefid', 256);
            $table->string('acondutyid', 256);
            $table->string('shift', 256);
            $table->string('frmsincidentnum', 256);
            $table->string('policeofficercompletesign', 256);
            $table->string('callsupervisor', 256);
            $table->string('createdby', 256);
            $table->string('updatedby', 256);
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
        Schema::drop('injury');
    }
}
