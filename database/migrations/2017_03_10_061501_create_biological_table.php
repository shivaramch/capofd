<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiologicalTable extends Migration
{

    public function up()
    {
    Schema::create('biological', function (Blueprint $table) {
    $table->increments('ofd6bid');
    $table->string('exposedemployeename',256);
    $table->date('dateofexposure');
    $table->string('employeeid',256);
    $table->string('assignmentbiological',256);
    $table->string('shift',256);
    $table->string('primaryidconumber',256);
    $table->string('epcrincidentnum',256);
    $table->string('frmsincidentnum',256);
    $table->date('todaysdate');
    $table->string('exposure',256);
    $table->string('exposureinjury',256);
    $table->string('truedecontaminate')->nullable();
    $table->string('confirmsource')->nullable();
    $table->string('bloodreport')->nullable();
    $table->string('exposuretab')->nullable();
    $table->string('truebagtag')->nullable();
    $table->string('notifypss')->nullable();
    $table->string('trueppe')->nullable();
    $table->string('truedocumentdaybook')->nullable();
    $table->string('potdecontaminate')->nullable();
    $table->string('potbagtag')->nullable();
    $table->string('potppe')->nullable();
    $table->string('potdocumentdaybook')->nullable();
    $table->string('createdby')->nullable();
    $table->string('updatedby')->nullable();
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
        Schema::drop('biological');
    }
}
