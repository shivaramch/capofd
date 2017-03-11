<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment', function (Blueprint $table) {
            $table->increments('attachmentid');
            $table->string('attachmentname', 256);
            $table->string('createdby', 256);
            $table->string('attachmenttype', 256);
            //$table->string('updatedby', 256);
            $table->integer('ofd6cid')->nullable();
            $table->integer('ofd6id')->nullable();
            $table->integer('ofd6bid')->nullable();
            $table->integer('ofd6aid')->nullable();

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
        Schema::drop('attachment');
    }
}
