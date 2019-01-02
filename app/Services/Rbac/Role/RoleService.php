<?php

namespace App\Services\Rbac\Role;

use App\Services\Contracts\BaseServiceInterface as BaseService;
use App\Services\Contracts\BatchChangeStateServiceInterface as BatchChangeState;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface RoleService
 *
 * 角色服务接口
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\Role
 */
interface RoleService extends BatchChangeState, BaseService
{
    /**
     * 分配角色权限
     *
     * @param int   $roleId          角色ID
     * @param array $permissionIdArr 权限id数组
     *
     * @return bool
     */
    public function allotPermission(int $roleId, array $permissionIdArr) : bool;
    
    /**
     * 删除分配给角色的全部权限
     *
     * @param int $roleId 角色ID
     *
     * @return bool
     */
    public function deleteByRoleId(int $roleId) : bool;
    
    /**
     * 根据角色ID获取角色权限
     *
     * @param int $roleId
     *
     * @return Collection
     */
    public function getPermissionByRoleId(int $roleId) : Collection;
    
    /**
     * 根据角色ID集合获取角色权限集合
     *
     * @param array $roleIdArr
     *
     * @return Collection
     */
    public function getPermissionCollectionByRoleIdArr(array $roleIdArr) : Collection;
    
    /**
     * 通过角色ID获取角色信息
     *
     * @param array $idArr   角色ID数组
     * @param array $columns 获取的列
     *
     * @return Collection
     */
    public function getRoleCollectionByIdArr(array $idArr, $columns = ['*']) : Collection;
}
