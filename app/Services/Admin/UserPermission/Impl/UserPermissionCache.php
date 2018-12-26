<?php

namespace App\Services\Admin\UserPermission\Impl;

use App\Models\Admin;
use App\Models\Role;
use App\Services\Admin\UserPermission\UserPermissionService;
use Cache;

/**
 * Class UserPermissionCache
 *
 * 用户权限缓存实现
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Admin\UserPermission\Impl
 */
class UserPermissionCache implements UserPermissionService
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
        // 缓存用户角色
        $rolesCollection = $userModel->roles()->with('permissions:id')->get(['id']);
        $roleIdArr       = $rolesCollection->pluck('id')->toJson();
        $expiresAt       = now()->addMinutes(10);
        Cache::put($this->getUserRoleCacheKey($userModel), $roleIdArr, $expiresAt);
        
        // 缓存用户权限
        $permissionIdArr = [];
        $rolesCollection->each(function (Role $role) use (&$permissionIdArr) {
            $permissionIdArr = array_merge($permissionIdArr, $role->permissions->pluck('id')->toArray());
        });
        $permissionIdArr = array_unique($permissionIdArr);
        Cache::put($this->getUserPermissionCacheKey($userModel), $permissionIdArr, $expiresAt);
        
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
        $key = $this->getUserPermissionCacheKey($userModel);
        if (Cache::has($key) === false) {
            $this->update($userModel);
        }
        
        return (array) Cache::get($key);
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
        $key = $this->getUserRoleCacheKey($userModel);
        if (Cache::has($key) === false) {
            $this->update($userModel);
        }
        
        return (array) Cache::get($key);
    }
    
    /**
     * 用户拥有的角色
     *
     * @param \App\Models\Admin $userModel
     *
     * @return string
     */
    private function getUserRoleCacheKey(Admin $userModel) : string
    {
        return "user_role:{$userModel->getTable()}:{$userModel->id}";
    }
    
    /**
     *
     *
     * @param \App\Models\Admin $userModel
     *
     * @return string
     */
    private function getUserPermissionCacheKey(Admin $userModel) : string
    {
        return "user_permission:{$userModel->getTable()}:{$userModel->id}";
    }
}
