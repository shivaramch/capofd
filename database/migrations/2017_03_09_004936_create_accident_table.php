<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccidentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

        public function up()
    {
        Schema::create('accident', function (Blueprint $table) {
            $table->increments('ofd6aid');

            $table->date('accidentdate');

            $table->string('drivername', 256);
            $table->string('driverid', 256);
            $table->string('assignmentaccident', 256);
            $table->string('apparatus', 256);

            $table->string('captainid', 256);
            $table->string('battalionchiefid', 256);
            $table->string('aconduty', 256);
            $table->string('applicationstatus', 256);
            $table->string('frmsincidentnum', 256);
            $table->string('calllaw', 256);
            $table->string('daybook', 256);
            $table->string('commemail', 256);
            $table->string('createdby', 256);
            $table->string('updatedby', 256);

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('accident');
    }
}
