<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 120)->default('')->comment('角色名称');
			$table->boolean('state')->default(0)->comment('启用状态 1-启用 2-禁用');
			$table->boolean('is_deleted')->default(0)->comment('是否删除: 0-未删除 1-已删除');
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
		Schema::drop('ba_roles');
	}

}
