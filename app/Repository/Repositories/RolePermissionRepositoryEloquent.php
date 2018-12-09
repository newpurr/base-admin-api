<?php

namespace App\Repository\Repositories;

use App\Exceptions\ParamterErrorException;
use App\Models\RolePermission;
use App\Repository\Contracts\RolePermissionRepository;
use App\Repository\Helper\BatchOperation;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class RolePermissionRepositoryEloquent.
 * @package namespace App\Repository\Repositories;
 */
class RolePermissionRepositoryEloquent extends BaseRepository implements RolePermissionRepository
{
    use BatchOperation;
    
    /**
     * Specify Model class name
     * @return string
     */
    public function model() : string
    {
        return RolePermission::class;
    }
    
    /**
     * 删除角色ID上的权限
     * @param int $roleId
     * @return int
     */
    public function deletePermissionByRoleId(int $roleId) : int
    {
        if (!$roleId) {
            throw new ParamterErrorException('请传递roleId参数');
        }
        
        return $this->deleteWhere([
            'role_id' => $roleId
        ]);
    }
}
