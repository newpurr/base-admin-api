<?php

namespace App\Services\Rbac\Permission;

use App\Services\Contracts\BaseServiceInterface as BaseService;
use App\Services\Contracts\BatchChangeStateServiceInterface as BatchChangeState;

/**
 * Interface PermissionService
 *
 * 权限服务接口
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\Role
 */
interface PermissionService extends BatchChangeState, BaseService
{
}
