<?php

namespace App\Services\Admin\UserPermission;

use App\Models\Admin;

/**
 * Interface UserPermissionService
 *
 * 用户权限service
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Admin\UserPermission
 */
interface UserPermissionService
{
    /**
     * 更新权限
     *
     * @param \App\Models\Admin $userModel
     *
     * @return bool
     */
    public function update(Admin $userModel) : bool;
    
    /**
     * 获取用户拥有的角色ID数组
     *
     * @param \App\Models\Admin $userModel
     *
     * @return array
     */
    public function getRoleIdArr(Admin $userModel) : array;
    
    /**
     * 获取用户拥有的权限ID数组
     *
     * @param \App\Models\Admin $userModel
     *
     * @return array
     */
    public function getPermissionIdArr(Admin $userModel) : array;
}
