<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuredExamsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('structured_exams', function (Blueprint $table) {
			$table->id();
			$table->text('Qn');
			$table->string('Ans');
			$table->string('Questionkey');
			$table->string('Course');
			$table->string('Module');
			$table->string('Instructor');
			$table->string('Institution');
			$table->string('Department');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('structured_exams');
	}
}
