<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Connectors\ConnectionFactory;

class CreateDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'base-admin:create-db {dbname : 请输入数据库名称}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '快速创建数据库';
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $schemaName = $this->argument('dbname');
        $charset    = config('database.connections.mysql.charset', 'utf8mb4');
        $collation  = config('database.connections.mysql.collation', 'utf8mb4_unicode_ci');
        
        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";
        
        /** @var ConnectionFactory $factory */
        $factory = app('db.factory');
        $factory->make([
            'driver' => config('database.connections.mysql.driver'),
            'host' => config('database.connections.mysql.host'),
            'port' => config('database.connections.mysql.port'),
            'database' => '',
            'username' => config('database.connections.mysql.username'),
            'password' => config('database.connections.mysql.password')
        ])->statement($query);
        
        $this->info('数据库创建成功');
    }
}
