<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Services\Rbac\Role\RoleService;
use Illuminate\Console\Command;

class AssignAllPermissionsToSuperRole extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'base-admin:ass-all-per';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '分配全部权限给超级管理员角色';
    
    /**
     * @var \App\Services\Rbac\Role\RoleService
     */
    protected $roleService;
    
    /**
     * AssignAllPermissionsToSuperRole constructor.
     *
     * @param \App\Services\Rbac\Role\RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        parent::__construct();
        
        $this->roleService = $roleService;
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $permissionIdArr = Permission::pluck('id')->toArray();
    
        $this->roleService->allotPermission(1, $permissionIdArr);
        
        $this->info('Execute successfully!');
    }
}
