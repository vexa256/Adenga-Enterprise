<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreboardsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('scoreboards', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('UserID');
			$table->string('Ans');
			$table->string('UserAnswer');
			$table->bigInteger('user');
			$table->bigInteger('exam');
			$table->string('Questionkey');
			$table->string('Course');
			$table->string('Module');
			$table->string('Instructor');
			$table->string('Institution');
			$table->string('Department');
			$table->string('score');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('scoreboards');
	}
}
