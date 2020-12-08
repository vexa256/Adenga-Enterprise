<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseModulesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('course_modules', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('Institution');
			$table->bigInteger('Instructor');
			$table->bigInteger('Course');
			$table->bigInteger('Department');
			$table->string('ModuleName');
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
		Schema::dropIfExists('course_modules');
	}
}
