<?php

namespace App\Services\Admin\UserPermission\Impl;

use App\Models\Admin;
use App\Models\Role;
use App\Services\Admin\UserPermission\UserPermissionService;

/**
 * Class UserPermissionDB
 *
 * 用户权限数据库实现
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Admin\UserPermission\Impl
 */
class UserPermissionDB implements UserPermissionService
{
    /**
     * 更新权限
     *
     * @param \App\Models\Admin $userModel
     *
     * @return bool
     */
    public function update(Admin $userModel) : bool
    {
        return true;
    }
    
    /**
     * 获取用户拥有的权限ID数组
     *
     * @param \App\Models\Admin $userModel
     *
     * @return array
     */
    public function getPermissionIdArr(Admin $userModel) : array
    {
        $rolesCollection = $userModel->roles()->with('permissions:id')->get(['id']);
        $permissionIdArr = [];
        $rolesCollection->each(function (Role $role) use (&$permissionIdArr) {
            $permissionIdArr = array_merge($permissionIdArr, $role->permissions->pluck('id')->toArray());
        });
        
        return $permissionIdArr;
    }
    
    /**
     * 获取用户拥有的角色ID数组
     *
     * @param \App\Models\Admin $userModel
     *
     * @return array
     */
    public function getRoleIdArr(Admin $userModel) : array
    {
        return $userModel->roles()->pluck('id')->toArray();
    }
}
