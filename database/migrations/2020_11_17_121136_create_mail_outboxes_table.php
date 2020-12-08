<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailOutboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_outboxes', function (Blueprint $table) {
            $table->id();
             $table->string('SenderName');
            $table->string('SenderEmail');
            $table->string('RecieverID');
            $table->string('RecieverEmail');
            $table->string('RecieverName');
            $table->string('SenderID');
            $table->string('Message');
            $table->string('Attachent_2');
            $table->string('Attachent_1');
            $table->string('Attachent_3');
            $table->string('Subject');
            $table->string('Read_Status')->nullable();
            $table->string('Reply_Status')->nullable();
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
        Schema::dropIfExists('mail_outboxes');
    }
}
