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
     * 角色service
     */
    private $roleService;
    
    /**
     * Role constructor.
     *
     * @param \App\Services\Rbac\Role\RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index() : array
    {
        
        $paginate = $this->roleService->paginate((int) \request('limit', 15));
        
        return $this->success($paginate);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function store(Request $request) : array
    {
        $roleModel = $this->roleService->create($request->only([ 'name' ]));
        
        return $this->success($roleModel->toArray());
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return array|mixed
     */
    public function show($id)
    {
        $roleModel = $this->roleService->find($id, [ 'id', 'name' ]);
        if (!$roleModel) {
            return response('', Response::HTTP_NOT_FOUND);
        }
        
        return $this->success($roleModel->toArray());
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return array
     */
    public function update(Request $request, $id) : array
    {
        $roleModel = $this->roleService->update($request->only([ 'name' ]), $id);
        
        return $this->success($roleModel->toArray());
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return array
     */
    public function destroy($id) : array
    {
        $this->roleService->softDelete($id);
        
        return $this->success();
    }
    
    /**
     * 批量禁用角色
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function batchDestory(Request $request) : array
    {
        $ids = $request->json('params.ids');
        if (!$ids) {
            throw new ParamterErrorException('请指定需要批量操作的选项ID');
        }
        
        $affectedRows = $this->roleService->batchDisabled(explode(',', $ids));
        
        return $this->success([
            'affected_rows' => $affectedRows
        ]);
    }
    
    /**
     * batchEnable
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function batchEnable(Request $request) : array
    {
        $ids = $request->json('params.ids');
        if (!$ids) {
            throw new ParamterErrorException('请指定需要批量操作的选项ID');
        }
    
        $affectedRows = $this->roleService->batchEnabled(explode(',', $ids));
    
        return $this->success([
            'affected_rows' => $affectedRows
        ]);
    }
}
