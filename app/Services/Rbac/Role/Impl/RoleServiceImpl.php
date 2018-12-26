<?php

namespace App\Services\Rbac\Role\Impl;

use App\Events\RolePermissionChanged;
use App\Exceptions\ParamterErrorException;
use App\Models\Permission;
use App\Models\Role;
use App\Repository\Contracts\RoleRepository;
use App\Repository\Criteria\IsDeletedCriteria;
use App\Repository\Criteria\StateCriteria;
use App\Services\Helper\BatchChangeState;
use App\Services\Rbac\Permission\PermissionService;
use App\Services\Rbac\Role\RoleService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RoleServiceImpl
 *
 * Role角色实现类
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\Role\Impl
 */
class RoleServiceImpl implements RoleService
{
    use BatchChangeState;
    
    /**
     * 权限service
     *
     * @var PermissionService
     */
    private $permissionService;
    
    /**
     * RoleServiceImpl constructor.
     *
     * @param PermissionService        $permissionService
     * @param RoleRepository           $roleRepository
     */
    public function __construct(
        PermissionService $permissionService,
        RoleRepository $roleRepository
    ) {
        $this->repostitory        = $roleRepository;
        $this->permissionService  = $permissionService;
    }
    
    /**
     * 获取分页列表
     *
     * @param int   $pageSize
     * @param array $columns
     *
     * @return LengthAwarePaginator
     */
    public function paginate(int $pageSize, $columns = [ '*' ]) : LengthAwarePaginator
    {
        $this->repostitory->pushCriteria(app(IsDeletedCriteria::class));
        $this->repostitory->pushCriteria(app(StateCriteria::class));
        return $this->repostitory->paginate($pageSize, $columns);
    }
    
    /**
     * 获取单个角色信息
     *
     * @param int   $id
     *
     * @param array $columns
     *
     * @return \App\Models\Role|null
     */
    public function find(int $id, $columns = ['*' ]) : ?Role
    {
        return $this->repostitory->find($id, $columns);
    }
    
    /**
     * 创建一个角色
     *
     * @param array $roleAttributes
     *
     * @return \App\Models\Role
     */
    public function create(array $roleAttributes) : Role
    {
        return $this->repostitory->create($roleAttributes);
    }
    
    /**
     * 更新一个角色
     *
     * @param array $roleAttributes
     * @param int   $id
     *
     * @return Role
     */
    public function update(array $roleAttributes, int $id) : Role
    {
        return $this->repostitory->update($roleAttributes, $id);
    }
    /**
     * 删除分配给角色的全部权限
     *
     * @param int $roleId
     *
     * @return bool
     */
    public function deleteByRoleId(int $roleId) : bool
    {
        if (empty($roleId)) {
            return false;
        }
    
        $model = $this->repostitory->find($roleId);
        
        $status = $this->repostitory->clearPermissionByRoleId($roleId);
        
        event(new RolePermissionChanged($model));
        
        return $status;
    }
    
    /**
     * 分配角色后端接口权限
     *
     * @param int   $roleId          角色ID
     * @param array $permissionIdArr 权限path数组
     *
     * @return bool
     * @throws \Exception
     */
    public function allotPermission(int $roleId, array $permissionIdArr) : bool
    {
        if (!$roleId) {
            throw new ParamterErrorException('请指定角色ID');
        }
    
        $model = $this->repostitory->find($roleId);
        
        // 过滤参数中给的权限集合,重新获取系统中正常的的权限
        $permissionCollection = $this->permissionService->getPermissionCollectionByIdArr(
            $permissionIdArr,
            ['is_deleted', 'id', 'state']
        );
        $permissionCollection = $permissionCollection->filter(function (Permission $permission) {
            return $permission->isNormality();
        })->pluck('id');
    
        $status = $this->repostitory->allotPermission($roleId, $permissionCollection->toArray());
    
        event(new RolePermissionChanged($model));
        
        return $status;
    }
    
    /**
     * 根据角色ID获取角色权限path路径
     *
     * @param int $roleId
     *
     * @return Collection
     */
    public function getPermissionByRoleId(int $roleId) : Collection
    {
        return $this->repostitory->getPermissionCollectionByRoleId($roleId);
    }
    
    /**
     * 通过角色ID获取角色信息
     *
     * @param array $idArr   角色ID数组
     * @param array $columns 获取的列
     *
     * @return Collection
     */
    public function getRoleCollectionByIdArr(array $idArr, $columns = ['*']) : Collection
    {
        return $this->repostitory->findWhereIn('id', $idArr, $columns);
    }
}
