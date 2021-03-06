<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClustersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clusters', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('cluster_id')->unsigned()->index();
			$table->string('type');
			$table->string('path');
			$table->string('slug');
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();

			$table->index(['deleted_at', 'path', 'name']);
			$table->index(['deleted_at', 'slug']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clusters');
	}
}
