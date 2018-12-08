<?php

namespace App\Services\Rbac\Role;

use App\Services\Contracts\BaseServiceInterface as BaseService;
use App\Services\Contracts\BatchChangeStateServiceInterface as BatchChangeState;

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
}
