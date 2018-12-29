<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaAssignedRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assigned_roles', function(Blueprint $table)
		{
			$table->integer('assigned_id')->unsigned()->comment('用户ID');
			$table->integer('role_id')->unsigned()->comment('角色ID');
			$table->unique(['assigned_id','role_id'], 'idx_uid_roleid');
			$table->unique(['role_id','assigned_id'], 'idx_roleid_uid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ba_assigned_roles');
	}

}
