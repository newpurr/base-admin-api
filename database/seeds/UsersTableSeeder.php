<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        
        \DB::table('users')->delete();
        
        \DB::table('users')->insert([
            0 => [
                'id'             => 1,
                'name'           => 'luotao',
                'email'          => 'luotao954@gmail.com',
                'password'       => '$2y$10$7xKcl2UHR87bgyawfCrqoOyXjVgpDdFpnL3HCVCRjWrK/H/vwcDs6',
                'remember_token' => '',
                'created_at'     => '2018-12-09 06:50:23',
                'updated_at'     => '2018-12-09 06:50:23',
            ],
            1 => [
                'id'             => 2,
                'name'           => 'luotao2',
                'email'          => '2417599488@qq.com',
                'password'       => '$2y$10$jlggJZS5JMshclZ3Y6hyV.GUaQuoYVLLCDtL2BbsCkItbxZbBQ1je',
                'remember_token' => null,
                'created_at'     => '2018-12-09 09:20:11',
                'updated_at'     => '2018-12-09 09:20:11',
            ],
        ]);
    }
}
