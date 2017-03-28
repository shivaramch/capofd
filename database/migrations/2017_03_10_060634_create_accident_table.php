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
            $table->integer('applicationstatus')->nullable();
            $table->string('frmsincidentnum', 256)->nullable();
            $table->string('calllaw', 256)->nullable();
            $table->string('checkbox1')->nullable();
            $table->string('checkbox2')->nullable();
            $table->string('checkbox3')->nullable();
            $table->string('checkbox4')->nullable();
            $table->string('checkbox5')->nullable();
            $table->string('checkbox6')->nullable();
            $table->string('checkbox7')->nullable();
            $table->string('checkbox8')->nullable();
            $table->string('checkbox9')->nullable();
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
