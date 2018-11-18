<?php

namespace App\Http\Controllers\Rbac\Role;

use App\Constant\StateEnum;
use App\Exceptions\ParamterErrorException;
use App\Http\Controllers\Controller;
use App\Services\Rbac\Role\RoleService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Services\Rbac\Role\RoleService $roleService
     *
     * @return array
     */
    public function index(RoleService $roleService) : array
    {
        
        $paginate = $roleService->paginate((int) \request('limit', 15));
        
        return $this->success($paginate);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Services\Rbac\Role\RoleService $roleService
     * @param  \Illuminate\Http\Request           $request
     *
     * @return array
     */
    public function store(RoleService $roleService, Request $request) : array
    {
        $roleModel = $roleService->create($request->only([ 'name' ]));
        
        return $this->success($roleModel->toArray());
    }
    
    /**
     * Display the specified resource.
     *
     * @param \App\Services\Rbac\Role\RoleService $roleService
     * @param  int                                $id
     *
     * @return array|mixed
     */
    public function show(RoleService $roleService, $id)
    {
        $roleModel = $roleService->find($id, [ 'id', 'name' ]);
        if (!$roleModel) {
            return response('', Response::HTTP_NOT_FOUND);
        }
        
        return $this->success($roleModel->toArray());
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \App\Services\Rbac\Role\RoleService $roleService
     * @param  \Illuminate\Http\Request           $request
     * @param  int                                $id
     *
     * @return array
     */
    public function update(RoleService $roleService, Request $request, $id) : array
    {
        $roleModel = $roleService->update($request->only([ 'name' ]), $id);
        
        return $this->success($roleModel->toArray());
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Services\Rbac\Role\RoleService $roleService
     * @param  int                                $id
     *
     * @return array
     */
    public function destroy(RoleService $roleService, $id) : array
    {
        $roleService->delete($id);
        
        return $this->success();
    }
    
    /**
     * 批量禁用角色
     *
     * @param \App\Services\Rbac\Role\RoleService $roleService
     * @param \Illuminate\Http\Request            $request
     *
     * @return array
     */
    public function batchDestory(RoleService $roleService, Request $request) : array
    {
        $ids = $request->json('params.ids');
        if (!$ids) {
            throw new ParamterErrorException('请指定需要批量操作的选项ID');
        }
        
        $ids          = explode(',', $ids);
        $affectedRows = $roleService->batchUpdate([ 'state' => StateEnum::DISABLED ], [
            'id_arr' => $ids
        ]);
        
        return $this->success([
            'affected_rows' => $affectedRows
        ]);
    }
    
    /**
     * batchEnable
     *
     * @param \App\Services\Rbac\Role\RoleService $roleService
     * @param \Illuminate\Http\Request            $request
     *
     * @return array
     */
    public function batchEnable(RoleService $roleService, Request $request) : array
    {
        $ids = $request->json('params.ids');
        if (!$ids) {
            throw new ParamterErrorException('请指定需要批量操作的选项ID');
        }
        
        $ids          = explode(',', $ids);
        $affectedRows = $roleService->batchUpdate([ 'state' => StateEnum::ENABLED ], [
            'id_arr' => $ids
        ]);
        
        return $this->success([
            'affected_rows' => $affectedRows
        ]);
    }
}
