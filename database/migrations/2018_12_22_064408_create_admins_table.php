<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account')
                  ->default('')
                  ->comment('账号')
                  ->nullable(false)
                  ->unique('admin_account_unique');
            $table->string('nickname')
                  ->default('')
                  ->comment('昵称')
                  ->nullable(false)
                  ->unique('admin_nickname_unique');
            $table->string('mobile')
                  ->default('')
                  ->comment('手机号')
                  ->nullable(false)
                  ->unique('admin_mobile_unique');
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
        Schema::dropIfExists('admins');
    }
}
