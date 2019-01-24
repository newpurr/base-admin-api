<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'base-admin:install
                            {--s|show : 显示帮助信息}';
    
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
        if ($this->option('show') || file_exists('./install.lock')) {
            $this->displaySuccess();
        
            return;
        }
        
        $this->setConfig();
        
        $this->createDb();
        
        $this->generateAppKey();
        
        $this->generateJwtSecret();
        
        $this->migrate();
        
        $this->seed();
    
        file_put_contents('./install.lock', '');
        
        $this->displaySuccess();
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
    
    /**
     * 更新配置
     */
    private function setConfig() : void
    {
        // 替换数据库信息
        $host = $this->ask('What is your mysql host?', config('database.connections.mysql.host'));
        
        $port = $this->ask('What is your port of mysql?', config('database.connections.mysql.port', '3306'));
        
        $user = $this->ask('What is your username of mysql?', config('database.connections.mysql.username'));
        
        $pass = $this->ask('What is your password of mysql?', config('database.connections.mysql.password'));
        
        $path = $this->envPath();
        
        file_put_contents($path, str_replace([
            'DB_HOST=' . config('database.connections.mysql.host'),
            'DB_PORT=' . config('database.connections.mysql.port'),
            'DB_USERNAME=' . config('database.connections.mysql.username'),
            'DB_PASSWORD=' . config('database.connections.mysql.password'),
        ], [
            'DB_HOST=' . $host,
            'DB_PORT=' . $port,
            'DB_USERNAME=' . $user,
            'DB_PASSWORD=' . $pass
        ], file_get_contents($path)));
        $this->info('保存设置成功.');
    }
    
    /**
     * 创建数据库
     */
    private function createDb() : void
    {
        // 创建数据库
        $this->info('');
        $this->info('正在创建数据库...');
        $dbname = config('database.connections.mysql.database', 'admin_base_com');
        Artisan::call('base-admin:create-db', [
            'dbname' => $dbname
        ]);
        $path = $this->envPath();
        
        file_put_contents($path, str_replace('DB_DATABASE=', 'DB_DATABASE='.$dbname, file_get_contents($path)));
        
        $this->info('数据库创建成功.');
    }
    
    /**
     * 生成APP Key
     *
     */
    private function generateAppKey() : void
    {
        // 生成app key
        $this->info('');
        $this->info('正在生成app key...');
        Artisan::call('config:cache');
        Artisan::call('key:generate');
        $this->info('app keys生成成功.');
    }
    
    /**
     * 生成JWT Secret
     */
    private function generateJwtSecret() : void
    {
        // 生成jwt secret
        $this->info('');
        $this->info('正在生成jwt secret...');
        Artisan::call('jwt:secret', ['--force' => true]);
        $this->info('jwt secret生成成功.');
    }
    
    /**
     * 迁移表结构
     */
    private function migrate() : void
    {
        // 迁移表结构
        $this->info('');
        $this->info('执行表迁移...');
        Artisan::call('migrate');
        $this->info('表迁移成功.');
    }
    
    /**
     * 填充数据
     */
    private function seed() : void
    {
        // 填充数据
        $this->info('');
        $this->info('执行填充数据...');
        Artisan::call('db:seed');
        $this->info('数据填充成功...');
    }
    
    /**
     * 展示成功信息
     */
    private function displaySuccess() : void
    {
        $this->info('');
        $this->info('base-admin-api安装成功');
        $this->info('');
        $this->info('');
        $this->comment('--------------------------------------------------------------------------------');
        $swooleHttpPort = config('swoole_http.server.port');
        $this->info('辅助说明:');
        $this->info('');
        $this->info(<<<EOL
1) 请在Nginx里设置如下server:
server
{
    listen 80;
    # !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    # you.host 需要替换成你自己的host
    # !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    server_name you.host;
    
    # !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!！
    # /you/path/to/base-admin-api/public/ 需要根据你clone的地址进行替换
    # !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!！
    root /you/path/to/base-admin-api/public/;
    index index.html index.htm index.php;
    error_page  500 502 503 504  /error_page.htm;
    location /
    {
        proxy_set_header Host \$http_host;
        proxy_set_header Scheme \$scheme;
        proxy_set_header SERVER_PORT \$server_port;
        proxy_set_header REMOTE_ADDR \$remote_addr;
        proxy_set_header Connection "keep-alive";
        proxy_set_header X-Real-IP \$remote_addr;
        proxy_set_header X-Forwarded-For \$proxy_add_x_forwarded_for;
        proxy_pass http://127.0.0.1:{$swooleHttpPort};
    }
}

2) 重启nginx: nginx -s reload
EOL
        );
    
        $this->info('3) 启动swoole服务: php artisan swoole:http start');
        $this->info('4) 前台访问: 通过您设置的域名即可访问到服务');
        $this->comment('--------------------------------------------------------------------------------');
    }
}
