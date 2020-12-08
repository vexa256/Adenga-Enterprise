<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseInstructorsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('course_instructors', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('Institution');
			$table->bigInteger('Department');
			$table->string('InstructorName');
			$table->string('PhoneNumber');
			$table->string('Address');
			$table->string('Country');
			$table->text('Email');
			$table->string('UserID');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('course_instructors');
	}
}
