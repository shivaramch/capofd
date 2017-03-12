<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiologicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biologicals', function (Blueprint $table) {
            $table->increments('ofd6bid');
            $table->string('exposedemployeename',256)->nullable();
            $table->date('dateofexposure')->nullable();
            $table->string('employeeid',256)->nullable();
            $table->string('assignmentbiological',256)->nullable();
            $table->string('shift',256)->nullable();
            $table->string('primaryidconumber',256)->nullable();
            $table->string('epcrincidentnum',256)->nullable();
            $table->string('frmsincidentnum',256)->nullable();
            $table->date('todaysdate')->nullable();
            $table->string('exposure',256)->nullable();
            $table->string('exposureinjury',256)->nullable();
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
            $table->string('applicationstatus', 256)->nullable();
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
        Schema::drop('biological');
    }
}