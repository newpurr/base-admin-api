<?php

namespace App\Http\Controllers\Rbac\Role;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\SimpleOperation;
use App\Services\Rbac\Role\RoleService;
use Illuminate\Http\Request;
use SuperHappysir\Support\Utils\Response\JsonResponseBodyInterface;

class Role extends Controller
{
    use SimpleOperation;
    
    /**
     * 角色service
     */
    private $service;
    
    /**
     * Role constructor.
     * @param \App\Services\Rbac\Role\RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->service = $roleService;
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
        $roleModel = $this->service->create($request->only(['name']));
        
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
        $roleModel = $this->service->update($request->only(['name']), $id);

        return build_successful_body($roleModel->toArray());
    }
    
    /**
     * 分配权限
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @param int                       $roleId
     *
     * @return JsonResponseBodyInterface
     */
    public function allotPermission(Request $request, int $roleId) : JsonResponseBodyInterface
    {
        $this->service->allotPermission($roleId, $request->json('permission_list', []));
        
        return build_successful_body();
    }
    
    /**
     * 获取角色拥有的权限ID数组
     *
     * @param int $roleId 角色ID
     *
     * @return JsonResponseBodyInterface
     */
    public function getPermissionByRoleId($roleId) : JsonResponseBodyInterface
    {
        $permissionIdList = $this->service->getPermissionByRoleId($roleId);
        
        return build_successful_body([
            'permission_list' => $permissionIdList
        ]);
    }
}
