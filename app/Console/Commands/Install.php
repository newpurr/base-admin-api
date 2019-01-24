<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'base-admin:install';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '快速安裝base-admin-api';
    
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // 1.替换数据库信息
        $host = $this->ask('What is your mysql host?', config('database.connections.mysql.host', 'localhost'));
        
        $port = $this->ask('What is your port of mysql?', config('database.connections.mysql.port', '3306'));
        
        $database = $this->ask('What is your database?',
            config('database.connections.mysql.database', 'admin_base_com'));
        
        $user = $this->ask('What is your username of mysql?', config('database.connections.mysql.username', 'root'));
        
        $pass = $this->ask('What is your password of mysql?', config('database.connections.mysql.password', '123456'));
        
        $path = $this->envPath();
        
        file_put_contents($path, str_replace([
            'DB_HOST=' . config('database.connections.mysql.host', 'localhost'),
            'DB_PORT=' . config('database.connections.mysql.port', '3306'),
            'DB_DATABASE=' . config('database.connections.mysql.database', 'admin_base_com'),
            'DB_USERNAME=' . config('database.connections.mysql.username', 'root'),
            'DB_PASSWORD=' . config('database.connections.mysql.password', '123456'),
        ], [
            'DB_HOST=' . $host,
            'DB_PORT=' . $port,
            'DB_DATABASE=' . $database,
            'DB_USERNAME=' . $user,
            'DB_PASSWORD=' . $pass
        ], file_get_contents($path)));
    
        // 2.生成app key
        Artisan::call('config:cache');
        Artisan::call('key:generate');
    
        // 3.生成jwt secret
        Artisan::call('config:cache');
        Artisan::call('jwt:secret');
        
        // 4.迁移表结构
        Artisan::call('artisan migrate');
        
        // 5.填充数据
        Artisan::call('php artisan db:seed');
    }
    
    /**
     * Get the .env file path.
     *
     * @return string
     */
    protected function envPath() : string
    {
        if (method_exists($this->laravel, 'environmentFilePath')) {
            return $this->laravel->environmentFilePath();
        }
        
        // check if laravel version Less than 5.4.17
        if (version_compare($this->laravel->version(), '5.4.17', '<')) {
            return $this->laravel->basePath() . DIRECTORY_SEPARATOR . '.env';
        }
        
        return $this->laravel->basePath('.env');
    }
}
