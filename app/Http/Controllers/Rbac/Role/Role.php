<?php

namespace App\Http\Controllers\Rbac\Role;

use App\Exceptions\ParamterErrorException;
use App\Http\Controllers\Controller;
use App\Services\Rbac\Role\RoleService;
use Illuminate\Http\Request;
use SuperHappysir\Utils\Response\JsonResponseBodyInterface;

class Role extends Controller
{
    /**
     * 角色service
     */
    private $roleService;
    
    /**
     * Role constructor.
     * @param \App\Services\Rbac\Role\RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    
    /**
     * Display a listing of the resource.
     * @return JsonResponseBodyInterface
     */
    public function index() : JsonResponseBodyInterface
    {
        
        $paginate = $this->roleService->paginate((int) \request('limit', 15));
        
        return json_success_response($paginate);
    }
    
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return JsonResponseBodyInterface
     */
    public function store(Request $request) : JsonResponseBodyInterface
    {
        $roleModel = $this->roleService->create($request->only(['name']));
        
        return json_success_response($roleModel->toArray());
    }
    
    /**
     * Display the specified resource.
     * @param  int $id
     * @return JsonResponseBodyInterface|mixed
     */
    public function show($id)
    {
        $roleModel = $this->roleService->find($id, [
            'id',
            'name'
        ]);
        if (!$roleModel) {
            throw new ParamterErrorException('无指定资源');
        }
        
        return json_success_response($roleModel->toArray());
    }
    
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return JsonResponseBodyInterface
     */
    public function update(Request $request, $id) : JsonResponseBodyInterface
    {
        $roleModel = $this->roleService->update($request->only(['name']), $id);

        return json_success_response($roleModel->toArray());
    }
    
    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return JsonResponseBodyInterface
     */
    public function destroy($id) : JsonResponseBodyInterface
    {
        $this->roleService->softDelete($id);
        
        return json_success_response();
    }
    
    /**
     * 批量禁用角色
     * @param \Illuminate\Http\Request $request
     * @return JsonResponseBodyInterface
     */
    public function batchDisabled(Request $request) : JsonResponseBodyInterface
    {
        $ids = $request->json('params.ids');
        if (!$ids) {
            throw new ParamterErrorException('请指定需要批量操作的选项ID');
        }
        
        $affectedRows = $this->roleService->batchDisabled(explode(',', $ids));
        
        return json_success_response([
            'affected_rows' => $affectedRows
        ]);
    }
    
    /**
     * batchEnable
     * @param \Illuminate\Http\Request $request
     * @return JsonResponseBodyInterface
     */
    public function batchEnable(Request $request) : JsonResponseBodyInterface
    {
        $ids = $request->json('params.ids');
        if (!$ids) {
            throw new ParamterErrorException('请指定需要批量操作的选项ID');
        }
        
        $affectedRows = $this->roleService->batchEnabled(explode(',', $ids));
        
        return json_success_response([
            'affected_rows' => $affectedRows
        ]);
    }
}
