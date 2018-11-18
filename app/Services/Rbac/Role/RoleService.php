<?php

namespace App\Services\Rbac\Role;

use App\Services\Rbac\Role\Contracts\BaseServiceInterface;
use App\Services\Rbac\Role\Contracts\BatchOperationServiceInterface;

/**
 * Interface RoleService
 *
 * 角色服务接口
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\Role
 */
interface RoleService extends BaseServiceInterface, BatchOperationServiceInterface
{
}
