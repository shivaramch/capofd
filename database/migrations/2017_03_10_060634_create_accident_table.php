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
        Schema::create('accidents', function (Blueprint $table) {
            $table->increments('ofd6aid');

            $table->date('accidentdate')->nullable();

            $table->string('drivername', 256)->nullable();
            $table->string('driverid', 256)->nullable();
            $table->string('assignmentaccident', 256)->nullable();
            $table->string('apparatus', 256)->nullable();

            $table->string('captainid', 256)->nullable();
            $table->string('battalionchiefid', 256)->nullable();
            $table->string('aconduty', 256)->nullable();
            $table->string('applicationstatus', 256)->nullable();
            $table->string('frmsincidentnum', 256)->nullable();
            $table->string('calllaw', 256)->nullable();
            $table->string('daybook', 256)->nullable();
            $table->string('commemail', 256)->nullable();
            $table->string('createdby', 256)->nullable();
            $table->string('updatedby', 256)->nullable();

            $table->ipAddress('ip_address', 45)->nullable();
// application status nullable
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
        Schema::drop('accidents');
    }
}
