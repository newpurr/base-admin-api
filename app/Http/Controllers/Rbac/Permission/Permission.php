<?php

namespace App\Http\Controllers\Rbac\Permission;

use App\Http\Controllers\Controller;
use App\Services\Rbac\Permission\PermissionService;

class Permission extends Controller
{
    /**
     * 权限service
     * @var PermissionService
     */
    private $permissionService;
    
    /**
     * Permission constructor.
     * @param PermissionService $permissionService
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }
    
    /**
     * Display a listing of the resource.
     * @return array
     */
    public function index() : array
    {
        $paginate = $this->permissionService->paginate((int) \request('limit', 15));
        
        return json_response()->success($paginate);
    }
}