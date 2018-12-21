<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        
        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert([
            0 => [
                'id'         => 1,
                'name'       => '超级管理员',
                'state'      => 1,
                'is_deleted' => 0,
                'created_at' => '2018-09-19 20:36:02',
                'updated_at' => '2018-11-18 14:10:06',
            ],
            1 => [
                'id'         => 2,
                'name'       => '普通管理员',
                'state'      => 1,
                'is_deleted' => 0,
                'created_at' => '2018-09-19 20:36:26',
                'updated_at' => '2018-12-08 09:46:50',
            ],
            2 => [
                'id'         => 3,
                'name'       => '普通管理员21',
                'state'      => 1,
                'is_deleted' => 1,
                'created_at' => '2018-09-24 10:36:59',
                'updated_at' => '2018-12-11 14:11:32',
            ],
            3 => [
                'id'         => 4,
                'name'       => '名字长一点11111',
                'state'      => 1,
                'is_deleted' => 0,
                'created_at' => '2018-12-08 14:28:00',
                'updated_at' => '2018-12-09 06:01:26',
            ],
            4 => [
                'id'         => 5,
                'name'       => '测试',
                'state'      => 2,
                'is_deleted' => 0,
                'created_at' => '2018-12-16 14:05:46',
                'updated_at' => '2018-12-16 14:05:46',
            ],
            5 => [
                'id'         => 6,
                'name'       => '测试22',
                'state'      => 1,
                'is_deleted' => 0,
                'created_at' => '2018-12-16 14:05:57',
                'updated_at' => '2018-12-16 14:19:31',
            ],
            6 => [
                'id'         => 7,
                'name'       => '测试111',
                'state'      => 1,
                'is_deleted' => 0,
                'created_at' => '2018-12-16 14:16:52',
                'updated_at' => '2018-12-16 14:19:31',
            ],
        ]);
    }
}
