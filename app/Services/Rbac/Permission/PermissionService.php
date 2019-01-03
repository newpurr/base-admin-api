<?php

namespace App\Services\Rbac\Permission;

use App\Services\Contracts\BaseServiceInterface as BaseService;
use App\Services\Contracts\BatchChangeStateServiceInterface as BatchChangeState;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface PermissionService
 *
 * 权限服务接口
 *
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Services\Rbac\Role
 */
interface PermissionService extends BatchChangeState, BaseService
{
    /**
     * 获取所有前端路径path
     *
     * @return array
     */
    public function getTheFrontEndPath() : array;
    
    /**
     * 通过权限ID获取权限信息
     *
     * @param array $idArr   权限ID数组
     * @param array $columns 获取的列
     *
     * @return Collection
     */
    public function getPermissionCollectionByIdArr(array $idArr, $columns = ['*']) : Collection;
}
