<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHazmatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hazmat', function (Blueprint $table) {
            $table->increments('ofd6cid');
            $table->string('employeeID',256);
            $table->string('exposedEmployeeName', 256);
            $table->date('dateOfExposure');
            $table->string('idconumber',256);
            $table->string('epcrIncidentNum', 256);
            $table->string('assignmentHazmat', 256);
            $table->string('shift',256);

            $table->string('contactCorvel',256);
            $table->string('corvelID', 256);
            $table->string('attachOFD25', 256);
            $table->string('pathOFD25', 256);
            $table->string('updatedby', 256);
            $table->string('createdby', 256);
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
        Schema::drop('hazmat');
    }
}
