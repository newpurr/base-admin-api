<?php

namespace App\Console\Commands;

use App\User;
use Hash;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'admin:create';
    
    /**
     * The console command description.
     * @var string
     */
    protected $description = '创建一个系统用户';
    
    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $name     = $this->ask('What is your name?');
        $email    = $this->ask('What is your email?');
        $password = $this->secret('What is your password?');
        
        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
        ]);
        
        $this->info($name . ' has created!');
    }
}
