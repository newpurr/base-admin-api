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
			$table->string('method', 50)->default('GET')->comment('请求方法');
			$table->string('description')->default('')->comment('描述');
			$table->smallInteger('per_type')->unsigned()->comment('权限类型 1-API 2-菜单/页面 3-按钮');
			$table->integer('parent_id')->unsigned()->comment('父级权限ID');
			$table->boolean('state')->default(2)->comment('启用状态 1-启用 2-禁用');
			$table->boolean('is_deleted')->default(0)->comment('是否删除:0-未删除 1-已删除');
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
		Schema::drop('ba_permissions');
	}

}
