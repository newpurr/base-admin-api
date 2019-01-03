<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\NotFoundException;
use App\Exceptions\ParamterErrorException;
use App\Http\Controllers\Controller;
use App\Services\Admin\User\UserService;
use Illuminate\Http\Request;
use SuperHappysir\Support\Utils\Response\JsonResponseBodyInterface;
use Validator;

/**
 * Class UserController
 *
 * 管理员控制器
 *
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    /**
     * 权限service
     *
     * @var \App\Services\Admin\User\UserService
     */
    private $service;
    
    /**
     * Permission constructor.
     *
     * @param \App\Services\Admin\User\UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
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
            $request->only(['account','nickname','mobile','password','state'])
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
            'account',
            'nickname',
            'mobile',
            'mobile',
            'state',
            'created_at',
            'updated_at',
            'is_deleted',
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
            $request->only(['nickname','mobile','password','state']),
            $id
        );
        
        return build_successful_body($roleModel->toArray());
    }
    
    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return JsonResponseBodyInterface
     */
    public function destroy($id) : JsonResponseBodyInterface
    {
        $this->service->softDelete($id);
        
        return build_successful_body();
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
        
        $affectedRows = $this->service->batchDisabled(explode(',', $ids));
        
        return build_successful_body([
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
        $ids       = $request->json('params');
        $validator = Validator::make($ids, ['ids' => 'required|array'], [
            'ids.required' => '请指定需要批量操作的选项ID',
            'ids.array'    => 'params.ids字段必须是数组'
        ]);
        if ($validator->fails()) {
            throw new ParamterErrorException($validator->errors()->first());
        }
        
        $affectedRows = $this->service->batchEnabled($ids);
        
        return build_successful_body([
            'affected_rows' => $affectedRows
        ]);
    }
    
    /**
     * 分配角色
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \SuperHappysir\Support\Utils\Response\JsonResponseBodyInterface
     */
    public function allotRole(Request $request, int $id) : JsonResponseBodyInterface
    {
        $this->service->allotRole($id, $request->json('params.role_list', []));
    
        return build_successful_body();
    }
    
    /**
     * 获取角色拥有的权限ID数组
     *
     * @param int $id 用户ID
     *
     * @return JsonResponseBodyInterface
     */
    public function getRoleByRoleId($id) : JsonResponseBodyInterface
    {
        $roleList = $this->service->getRoleByUserId($id);
        
        return build_successful_body([
            'role_list' => $roleList
        ]);
    }
    
    /**
     * 获取角色拥有的权限ID数组
     *
     * @param int $id 用户ID
     *
     * @return JsonResponseBodyInterface
     */
    public function getPermissionByRoleId($id) : JsonResponseBodyInterface
    {
        $roleList = $this->service->getPermissionByUserId($id);
        
        return build_successful_body([
            'permission_list' => $roleList
        ]);
    }
}
