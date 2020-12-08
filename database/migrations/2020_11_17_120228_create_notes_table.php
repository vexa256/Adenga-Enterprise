<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('notes', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('Institution');
			$table->bigInteger('Instructor');
			$table->bigInteger('Course');
			$table->bigInteger('Module');
			$table->bigInteger('Department');
			$table->string('NotesName');
			$table->text('Notes');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('notes');
	}
}
