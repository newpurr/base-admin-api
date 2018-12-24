<?php

namespace App\Services\Rbac\RolePermission\Impl;

use App\Exceptions\ParamterErrorException;
use App\Models\Permission;
use App\Repository\Contracts\RolePermissionRepository;
use App\Repository\Contracts\RoleRepository;
use App\Services\Rbac\Permission\PermissionService;
use App\Services\Rbac\RolePermission\RolePermissionService;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RolePermission
 * 角色权限分配接口实现
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\RolePermission\Impl
 */
class RolePermissionImpl implements RolePermissionService
{
    /**
     * role permission Repository
     *
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
     * role Repository
     *
     * @var \App\Repository\Contracts\RoleRepository
     */
    private $roleRepository;
    
    /**
     * RoleServiceImpl constructor.
     *
     * @param RolePermissionRepository $rolePermissionRepository
     * @param PermissionService        $permissionService
     * @param RoleRepository           $roleRepository
     */
    public function __construct(
        RolePermissionRepository $rolePermissionRepository,
        PermissionService $permissionService,
        RoleRepository $roleRepository
    )
    {
        $this->rolePermissionRepository = $rolePermissionRepository;
        $this->permissionService        = $permissionService;
        $this->roleRepository = $roleRepository;
    }
    
    /**
     * 分配角色后端接口权限
     *
     * @param int   $roleId          角色ID
     * @param array $permissionIdArr 权限ID数组
     *
     * @return bool
     */
    public function allotBackendPermission(int $roleId, array $permissionIdArr) : bool
    {
        // TODO: Implement allot() method.
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
        
        return $this->rolePermissionRepository->deletePermissionByRoleId($roleId);
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
    public function allotFrontendPermission(int $roleId, array $permissionIdArr) : bool
    {
        if (!$roleId) {
            throw new ParamterErrorException('请指定角色ID');
        }
        
        // 过滤参数中给的权限集合,重新获取系统中正常的的权限
        $permissionCollection = $this->permissionService->getPermissionCollectionByIdArr(
            $permissionIdArr,
            ['is_deleted', 'id', 'state']
        );
        $permissionCollection = $permissionCollection->filter(function (Permission $permission) {
            return $permission->notDelete() && $permission->isEnabled();
        })->pluck('id');
    
        $this->roleRepository->sync($roleId, 'permissions', $permissionCollection);
        
        return true;
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
        return $this->rolePermissionRepository->getPermissionCollectionByRoleId($roleId);
    }
}
