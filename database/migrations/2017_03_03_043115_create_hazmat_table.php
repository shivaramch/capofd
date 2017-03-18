<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHazmatTable extends Migration
{

    public function up()
    {
        Schema::create('hazmats', function (Blueprint $table) {
            $table->increments('ofd6cid');
            $table->string('contactcorvel',256);
            $table->string('corvelid', 256);
            $table->string('frmsincidentnum', 256);
            $table->string('employeeid', 256);
            $table->string('employeename', 256);
            $table->date('dateofexposure');
            $table->string('primaryidconumber',256);
            $table->string('epcrincidentnum', 256);
            $table->string('assignment', 256);
            $table->string('shift',256);
            $table->string('applicationstatus', 256)->nullable();
            $table->string('checkbox1')->nullable();
            $table->string('exposurehazmat', 256) ->nullable();
            $table->string('updatedby', 256)->nullable();
            $table->string('createdby', 256);
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
        Schema::drop('hazmat');
    }
}
