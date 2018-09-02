<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaRolePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_id')->unsigned()->index('role_permissions_role_id_index')->comment('角色ID');
			$table->integer('permission_id')->unsigned()->index('role_permissions_permission_id_index')->comment('权限ID');
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
		Schema::drop('ba_role_permissions');
	}

}
