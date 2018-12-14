<?php

namespace App\Services\Rbac\RolePermission\Impl;

use App\Repository\Contracts\RolePermissionRepository;
use App\Services\Rbac\RolePermission\RolePermissionService;

/**
 * Class RolePermission
 * 角色权限分配接口实现
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\RolePermission\Impl
 */
class RolePermissionImpl implements RolePermissionService
{
    /**
     * role Repository
     * @var RolePermissionRepository
     */
    private $rolePermissionRepository;
    
    /**
     * RoleServiceImpl constructor.
     * @param RolePermissionRepository $rolePermissionRepository
     */
    public function __construct(RolePermissionRepository $rolePermissionRepository)
    {
        $this->rolePermissionRepository = $rolePermissionRepository;
    }
    
    /**
     * 分配角色后端接口权限
     * @param int   $roleId          角色ID
     * @param array $permissionIdArr 权限ID数组
     * @return bool
     */
    public function allotBackendPermission(int $roleId, array $permissionIdArr) : bool
    {
        // TODO: Implement allot() method.
    }
    
    /**
     * 删除分配给角色的全部权限
     * @param int $roleId
     * @return bool
     */
    public function deleteByRoleId(int $roleId) : bool
    {
        if (empty($roleId)) {
            return false;
        }
        
        return $this->rolePermissionRepository->deletePermissionByRoleId($roleId);
    }
    
    /**
     * 分配角色后端接口权限
     * @param int   $roleId            角色ID
     * @param array $permissionPathArr 权限path数组
     * @return bool
     * @throws \Exception
     */
    public function allotFrontendPermission(int $roleId, array $permissionPathArr) : bool
    {
        $idArr = \App\Models\Permission::whereIn('path', $permissionPathArr)->pluck('id');
        
        $insertRolePermissionArr = [];
        collect($idArr)->each(function ($item) use (&$insertRolePermissionArr, $roleId) {
            $insertRolePermissionArr[] = [
                'permission_id' => $item,
                'role_id'       => $roleId,
                'created_at'    => \Carbon\Carbon::now()
            ];
        });
        
        $this->deleteByRoleId($roleId);
        
        if ($insertRolePermissionArr) {
            \App\Models\RolePermission::insert($insertRolePermissionArr);
        }
        
        return true;
    }
    
    /**
     * 根据角色ID获取角色权限path路径
     *
     * @param int $roleId
     *
     * @return array
     */
    public function getPermissionByRoleId(int $roleId) : array
    {
        return $this->rolePermissionRepository->getPermissionIdArrByRoleId($roleId);
    }
}
