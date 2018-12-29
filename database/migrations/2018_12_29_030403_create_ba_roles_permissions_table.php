<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaRolesPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles_permissions', function(Blueprint $table)
		{
			$table->integer('role_id')->unsigned()->comment('角色ID');
			$table->integer('permission_id')->unsigned()->index('role_permissions_permission_id_index')->comment('权限ID');
			$table->unique(['role_id','permission_id'], 'role_permissions_role_id_index');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ba_roles_permissions');
	}

}
