<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('role')->nullable();
			$table->string('UserID')->nullable();
			$table->string('Country')->nullable();
			$table->string('Institution')->nullable();
			$table->string('Instructor')->nullable();
			$table->string('status_one')->nullable();
			$table->string('status_two')->nullable();
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->rememberToken();
			$table->foreignId('current_team_id')->nullable();
			$table->text('profile_photo_path')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
