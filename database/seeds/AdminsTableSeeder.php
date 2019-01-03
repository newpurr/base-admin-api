<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 =>
            array (
                'id' => 1,
                'account' => 'SuperHappysir2',
                'nickname' => 'luota2o',
                'mobile' => '18581405482',
                'password' => '$2y$10$PKnuGXL5TLXHCQrwHz5EE.U1wPrW/WU2vEnJKesBUiqeuLvGwITcW',
                'state' => 1,
                'is_deleted' => 0,
                'created_at' => '2018-12-23 09:10:34',
                'updated_at' => '2018-12-25 13:36:20',
            ),
            1 =>
            array (
                'id' => 2,
                'account' => 'SuperHappysir',
                'nickname' => 'admin3',
                'mobile' => '18581405483',
                'password' => '$2y$10$RxlncwuKRoL.M/HHch/Jjepcd0b4oEO44Wozk5cNOp4.YUuW16bHK',
                'state' => 1,
                'is_deleted' => 0,
                'created_at' => '2018-12-23 09:12:05',
                'updated_at' => '2018-12-26 08:01:46',
            ),
            2 =>
            array (
                'id' => 3,
                'account' => 'SuperHappysir3',
                'nickname' => 'luota2o1',
                'mobile' => '18581405485',
                'password' => '$2y$10$ZVTtXeWh6bqr4VCHJIl3q.YviLwzUja5cIobHWtMKXn.MZmtudAee',
                'state' => 2,
                'is_deleted' => 0,
                'created_at' => '2018-12-27 04:26:24',
                'updated_at' => '2018-12-27 04:26:24',
            ),
        ));
        
        
    }
}
