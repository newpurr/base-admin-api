<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('account')->default('')->unique('admin_account_unique')->comment('账号');
			$table->string('nickname')->default('')->unique('admin_nickname_unique')->comment('昵称');
			$table->string('mobile')->default('')->unique('admin_mobile_unique')->comment('手机号');
			$table->string('password');
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
		Schema::drop('ba_admins');
	}

}
