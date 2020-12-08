<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuredExamAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structured_exam_answers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Exam');
            $table->string('Questionkey')->nullable();
            $table->string('Course');
            $table->string('Module');
            $table->string('Instructor');
            $table->string('Institution');
            $table->bigInteger('user');
            $table->bigInteger('score');
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
        Schema::dropIfExists('structured_exam_answers');
    }
}
