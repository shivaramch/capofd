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
            $table->string('frmsincidentnum');
            $table->date('todaysDate');
            $table->string('exposure');
            $table->string('exposureInjury');
            $table->string('trueDecontaminate')->nullable();
            $table->string('confirmSource')->nullable();
            $table->string('bloodReport')->nullable();
            $table->string('exposureTab')->nullable();
            $table->string('trueBagTag')->nullable();
            $table->string('notifyPSS')->nullable();
            $table->string('truePPE')->nullable();
            $table->string('trueDocumentDayBook')->nullable();
            $table->string('potDecontaminate')->nullable();
            $table->string('potBagTag')->nullable();
            $table->string('potPPE')->nullable();
            $table->string('potDocumentDayBook')->nullable();
            //$table->string('trueInjury',null);
            //$table->string('potInjury',null);
            $table->string('createdBy')->nullable();
            $table->string('updatedBy')->nullable();
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
