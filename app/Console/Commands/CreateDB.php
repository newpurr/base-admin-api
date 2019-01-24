<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
        $schemaName = $this->argument('dbname') ? : config('database.connections.mysql.database');
        $charset    = config('database.connections.mysql.charset', 'utf8mb4');
        $collation  = config('database.connections.mysql.collation', 'utf8mb4_unicode_ci');
        
        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";
        
        DB::statement($query);
    
        $this->info('数据库创建成功');
    }
}
