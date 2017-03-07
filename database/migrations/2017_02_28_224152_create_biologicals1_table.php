<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiologicals1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biologicals', function (Blueprint $table) {
            $table->increments('ofd6bID');
            $table->string('exposedEmployeeName');
            $table->date('dateOfExposure');
            $table->integer('employeeID_1');
            $table->string('assignmentBiological');
            $table->string('shift');
            $table->integer('idcoNumber');
            $table->string('epcrIncidentNum');
            $table->date('todaysDate');
            $table->string('trueDecontaminate',null);
            $table->string('confirmSource',null);
            $table->string('trueOFD184',null);
            $table->string('bloodReport',null);
            $table->string('exposureTab',null);
            $table->string('trueBagTag',null);
            $table->string('notifyPSS',null);
            $table->string('truePPE',null);
            $table->string('trueDocumentDayBook',null);
            $table->string('potDecontaminate',null);
            $table->string('potBagTag',null);
            $table->string('potOFD184',null);
            $table->string('potPPE',null);
            $table->string('potDocumentDayBook',null);
            $table->string('trueInjury',null);
            $table->string('potInjury',null);
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
        Schema::drop('biologicals');
    }
}

