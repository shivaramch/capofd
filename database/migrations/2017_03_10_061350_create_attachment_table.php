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
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('attachmentid');
            $table->string('attachmentname', 256)->nullable();
            $table->string('createdby', 256)->nullable();
            $table->string('attachmenttype', 256)->nullable();
            $table->integer('ofd6cid')->nullable();
            $table->integer('ofd6id')->nullable();
            $table->integer('ofd6bid')->nullable();
            $table->integer('ofd6aid')->nullable();
            $table->integer('limiteddutyid')->nullable();
            $table->integer('fmlaid')->nullable();

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
        Schema::drop('attachments');
    }
}
