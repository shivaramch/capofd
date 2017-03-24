<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLimitedDutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limitedduties', function (Blueprint $table) {
            $table->increments('limiteddutyid');
            $table->string('employeename', 256)->nullable();
            $table->date('fromdate')->nullable();
            $table->date('todate')->nullable();
            $table->string('employeeid', 256)->nullable();
            $table->string('corvelid', 256)->nullable();
            $table->string('incidentid', 256)->nullable();
            $table->string('incidenttype', 256)->nullable();
            $table->string('comments', 256)->nullable();
            $table->timestamps();
            $table->ipAddress('ip_address', 45)->nullable();
            $table->string('createdby', 256)->nullable();
            $table->string('updatedby', 256)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('limitedduties');
    }
}
