<?php

namespace App\Services\Rbac\RolePermission\Impl;

use App\Models\Permission;
use App\Repository\Contracts\RolePermissionRepository;
use App\Services\Rbac\Permission\PermissionService;
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
     * 权限service
     *
     * @var PermissionService
     */
    private $permissionService;
    
    /**
     * RoleServiceImpl constructor.
     *
     * @param RolePermissionRepository $rolePermissionRepository
     * @param PermissionService        $permissionService
     */
    public function __construct(
        RolePermissionRepository $rolePermissionRepository,
        PermissionService $permissionService
    ) {
        $this->rolePermissionRepository = $rolePermissionRepository;
        $this->permissionService        = $permissionService;
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
     * @param array $permissionIdArr   权限path数组
     * @return bool
     * @throws \Exception
     */
    public function allotFrontendPermission(int $roleId, array $permissionIdArr) : bool
    {
        if (!$roleId) {
            throw new \Exception('请指定角色ID');
        }
        
        // 过滤参数中给的权限集合,重新获取系统中正常的的权限
        $permissionCollection = $this->permissionService->getPermissionCollectionByIdArr($permissionIdArr);
        $permissionCollection = $permissionCollection->filter(function (Permission $permission) {
            return $permission->notDelete() && $permission->isEnabled();
        });
        
        // 组合待批量插入的数据
        $insertRolePermissionArr = [];
        if (!$permissionCollection->isEmpty()) {
            $permissionCollection->each(function (Permission $permission) use (&$insertRolePermissionArr, $roleId) {
                $insertRolePermissionArr[] = [
                    'permission_id' => $permission->id,
                    'role_id'       => $roleId,
                    'created_at'    => \Carbon\Carbon::now()
                ];
            });
        }
        
        // 删除已有的权限数据
        $this->deleteByRoleId($roleId);
        
        // 批量插入数据
        if ($insertRolePermissionArr) {
            return $this->rolePermissionRepository->insert($insertRolePermissionArr);
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
