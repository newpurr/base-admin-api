<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table)
		{
			$table->increments('id')->comment('自增主键');
			$table->string('name', 120)->default('')->comment('权限名称');
			$table->string('path')->default('')->comment('权限path');
			$table->string('method', 10)->default('GET')->comment('请求方法');
			$table->string('description')->default('')->comment('描述');
			$table->smallInteger('per_type')->unsigned()->comment('权限类型 1-API 2-菜单/页面 3-按钮');
			$table->timestamps();
			$table->integer('parent_id')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ba_permissions');
	}

}
