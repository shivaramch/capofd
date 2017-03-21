<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('commentid');
            $table->text('comment')->nullable();
            $table->string('createdby', 256)->nullable();
            $table->string('applicationtype', 256)->nullable();
            $table->integer('applicationid')->nullable();

            $table->integer('isvisible')->nullable();
            $table->ipAddress('ip_address', 45)->nullable();

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
        Schema::drop('comments');
    }
}
