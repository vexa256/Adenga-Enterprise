<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('audio', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('Institution');
			$table->bigInteger('Instructor');
			$table->bigInteger('Course');
			$table->bigInteger('Module');
			$table->bigInteger('Department');
			$table->string('AudioName');
			$table->string('Url');
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
		Schema::dropIfExists('audio');
	}
}
