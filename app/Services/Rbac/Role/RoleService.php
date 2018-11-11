<?php

namespace App\Services\Rbac\Role;

use App\Models\Role;

/**
 * Interface RoleService
 *
 * 角色服务接口
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\Role
 */
interface RoleService
{
    /**
     * 获取单个角色信息
     *
     * @param int $roleId
     *
     * @return \App\Models\Role
     */
    public function find(int $roleId) : Role;
}
