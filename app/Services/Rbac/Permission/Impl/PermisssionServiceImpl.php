<?php

namespace App\Services\Rbac\Permission\Impl;

use App\Models\BaseModel;
use App\Repository\Contracts\PermissionRepository;
use App\Repository\Criteria\IsDeletedCriteria;
use App\Repository\Criteria\StateCriteria;
use App\Repository\Criteria\Permission\Type;
use App\Services\Rbac\Permission\PermissionService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PermisssionServiceImpl implements PermissionService
{
    /**
     * 权限service
     * @var PermissionRepository
     */
    protected $permissionRepository;
    
    /**
     * PermisssionServiceImpl constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }
    
    
    /**
     * 获取单个角色信息
     * @param int   $roleId
     * @param array $columns
     * @return BaseModel|null
     */
    public function find(int $roleId, $columns = ['*'])
    {
        // TODO: Implement find() method.
    }
    
    /**
     * 创建一个模型
     * @param array $attributes
     * @return BaseModel
     */
    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }
    
    /**
     * 获取分页列表
     * @param int   $pageSize
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $pageSize, $columns = ['*']) : LengthAwarePaginator
    {
        $this->permissionRepository->pushCriteria(app(IsDeletedCriteria::class));
        $this->permissionRepository->pushCriteria(app(StateCriteria::class));
        $this->permissionRepository->pushCriteria(app(Type::class));
        
        return $this->permissionRepository->paginate($pageSize, $columns);
    }
    
    /**
     * 更新一个模型
     * @param array $attributes
     * @param int   $id
     * @return BaseModel
     */
    public function update(array $attributes, int $id)
    {
        // TODO: Implement update() method.
    }
    
    /**
     * 删除一个模型
     * @param int $id
     * @return bool
     */
    public function softDelete(int $id)
    {
        // TODO: Implement softDelete() method.
    }
    
    /**
     * 批量启用
     * @param array $idArr
     * @return int
     */
    public function batchEnabled(array $idArr)
    {
        // TODO: Implement batchEnabled() method.
    }
    
    /**
     * 批量禁用
     * @param array $idArr
     * @return int
     */
    public function batchDisabled(array $idArr)
    {
        // TODO: Implement batchDisabled() method.
    }
}