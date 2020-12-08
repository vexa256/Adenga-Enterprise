<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuredExamsDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structured_exams_documents', function (Blueprint $table) {
            $table->id();
            $table->string('DocumentURL');
            $table->text('Description');
            $table->string('Questionkey')->nullable();
            $table->string('Course');
            $table->string('Module');
            $table->string('Instructor');
            $table->string('Institution');
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
        Schema::dropIfExists('structured_exams_documents');
    }
}
