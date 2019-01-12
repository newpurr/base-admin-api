<?php

namespace App\Http\Controllers\Rbac\Permission;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SimpleOperation;
use App\Services\Rbac\Permission\PermissionService;
use Illuminate\Http\Request;
use SuperHappysir\Support\Utils\Response\JsonResponseBodyInterface;

/**
 * Class Permission
 *
 * 权限控制器
 *
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Http\Controllers\Rbac\Permission
 */
class Permission extends Controller
{
    use SimpleOperation;
    
    /**
     * 权限service
     * @var PermissionService
     */
    private $service;
    
    /**
     * Permission constructor.
     * @param PermissionService $permissionService
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->service = $permissionService;
    }
    
    /**
     * Display a listing of the resource.
     * @return JsonResponseBodyInterface
     */
    public function index() : JsonResponseBodyInterface
    {
        $paginate = $this->service->paginate((int) \request('limit', 15));
        
        return build_successful_body($paginate);
    }
    
    
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return JsonResponseBodyInterface
     */
    public function store(Request $request) : JsonResponseBodyInterface
    {
        $roleModel = $this->service->create(
            $request->only(['name','path','method','description','permission_type','state'])
        );
        
        return build_successful_body($roleModel->toArray());
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return JsonResponseBodyInterface|mixed
     * @throws \App\Exceptions\NotFoundException
     */
    public function show($id)
    {
        $roleModel = $this->service->find($id, [
            'id',
            'name'
        ]);
        if (!$roleModel) {
            throw new NotFoundException();
        }
        
        return build_successful_body($roleModel->toArray());
    }
    
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return JsonResponseBodyInterface
     */
    public function update(Request $request, $id) : JsonResponseBodyInterface
    {
        $roleModel = $this->service->update(
            $request->only(['name','path','method','description','permission_type','state', 'parent_id']),
            $id
        );
        
        return build_successful_body($roleModel->toArray());
    }
    
    /**
     * 批量创建前端路由权限
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return JsonResponseBodyInterface
     */
    public function createTheFrontEndPathPermission(Request $request) : JsonResponseBodyInterface
    {
        $this->service->createTheFrontEndPathPermission($request->input('permissions'));
    
        return build_successful_body();
    }
}
