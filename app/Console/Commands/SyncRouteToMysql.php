<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Routing\Router;

class SyncRouteToMysql extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync-route:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '同步路由数据到mysql';
    
    /**
     *
     *
     * @var \Illuminate\Routing\Router
     */
    private $router;
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        dd($this->getRoutes());
        $this->info('Route has send!');
    }
    
    /**
     * Compile the routes into a displayable format.
     *
     * @return array
     */
    protected function getRoutes()
    {
        $routes = collect($this->router->getRoutes());
        dd($routes);
        if ($sort = $this->option('sort')) {
            $routes = $this->sortRoutes($sort, $routes);
        }
        
        if ($this->option('reverse')) {
            $routes = array_reverse($routes);
        }
        
        return array_filter($routes);
    }
}
