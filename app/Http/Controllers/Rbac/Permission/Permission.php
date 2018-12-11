<?php

namespace App\Http\Controllers\Rbac\Permission;

use App\Exceptions\ParamterErrorException;
use App\Http\Controllers\Controller;
use App\Services\Rbac\Permission\PermissionService;
use Illuminate\Http\Request;

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
    
        $this->middleware('auth:api');
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
    
    
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request) : array
    {
        $roleModel = $this->permissionService->create(
            $request->only(['name','path','method','description','per_type','state'])
        );
        
        return json_response()->success($roleModel->toArray());
    }
    
    /**
     * Display the specified resource.
     * @param  int $id
     * @return array|mixed
     */
    public function show($id)
    {
        $roleModel = $this->permissionService->find($id, [
            'id',
            'name'
        ]);
        if (!$roleModel) {
            throw new ParamterErrorException('无指定资源');
        }
        
        return json_response()->success($roleModel->toArray());
    }
    
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return array
     */
    public function update(Request $request, $id) : array
    {
        $roleModel = $this->permissionService->update(
            $request->only(['name','path','method','description','per_type','state']),
            $id
        );
        
        return json_response()->success($roleModel->toArray());
    }
    
    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return array
     */
    public function destroy($id) : array
    {
        $this->permissionService->softDelete($id);
        
        return json_response()->success();
    }
    
    /**
     * 批量禁用角色
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function batchDisabled(Request $request) : array
    {
        $ids = $request->json('params.ids');
        if (!$ids) {
            throw new ParamterErrorException('请指定需要批量操作的选项ID');
        }
        
        $affectedRows = $this->permissionService->batchDisabled(explode(',', $ids));
        
        return json_response()->success([
            'affected_rows' => $affectedRows
        ]);
    }
    
    /**
     * batchEnable
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function batchEnable(Request $request) : array
    {
        $ids = $request->json('params.ids');
        if (!$ids) {
            throw new ParamterErrorException('请指定需要批量操作的选项ID');
        }
        
        $affectedRows = $this->permissionService->batchEnabled(explode(',', $ids));
        
        return json_response()->success([
            'affected_rows' => $affectedRows
        ]);
    }
}
