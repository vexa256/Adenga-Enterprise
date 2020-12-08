<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_banks', function (Blueprint $table) {
            $table->id();
            $table->string('Qn');
            $table->string('Questionkey')->nullable();
            $table->string('Course');
            $table->string('Module');
            $table->string('Instructor');
            $table->string('Institution');
            $table->string('opt1');
            $table->string('opt2');
            $table->string('opt3');
            $table->string('opt4');
            $table->string('opt5')->nullable();
          
            
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
        Schema::dropIfExists('question_banks');
    }
}
