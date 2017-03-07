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
            $table->string('trueDecontaminate');
            $table->string('confirmSource');
            $table->string('trueOFD184');
            $table->string('bloodReport');
            $table->string('exposureTab');
            $table->string('trueBagTag');
            $table->string('notifyPSS');
            $table->string('truePPE');
            $table->string('trueDocumentDayBook');
            $table->string('potDecontaminate');
            $table->string('potBagTag');
            $table->string('potOFD184');
            $table->string('potPPE');
            $table->string('potDocumentDayBook');
            $table->string('trueInjury');
            $table->string('potInjury');
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
