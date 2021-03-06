<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('courses', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('Institution');
			$table->bigInteger('Department');
			$table->bigInteger('Instructor');
			$table->string('CourseName');
			$table->text('Description');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('courses');
	}
}
