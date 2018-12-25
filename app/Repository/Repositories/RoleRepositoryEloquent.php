<?php

namespace App\Repository\Repositories;

use App\Models\Role;
use App\Repository\Contracts\RoleRepository;
use App\Repository\Helper\BatchOperation;
use App\Repository\Validators\RoleValidator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Repository\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    use BatchOperation;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() : string
    {
        return Role::class;
    }
    
    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return RoleValidator::class;
    }
    
    /**
     * 分配权限
     *
     * @param int   $roleId          role id
     * @param array $permissionIdArr the permission model  primaryKey array
     *
     * @return bool
     * @throws \Exception
     */
    public function allotPermission(int $roleId, array $permissionIdArr) : bool
    {
        try {
            $this->sync($roleId, 'permissions', $permissionIdArr);
        } catch (\Exception $e) {
            throw $e;
        }
        
        return true;
    }
    
    /**
     * 清空角色拥有的的权限
     *
     * @param int $roleId
     *
     * @return bool
     * @throws \Exception
     */
    public function clearPermissionByRoleId(int $roleId) : bool
    {
        return $this->allotPermission($roleId, []);
    }
    
    /**
     * 根据角色ID获取角色拥有的权限
     *
     * @param int $roleId
     *
     * @return Collection
     */
    public function getPermissionCollectionByRoleId(int $roleId) : Collection
    {
        /** @var \App\Models\Role $roleModel */
        $roleModel = $this->with('permissions')->find($roleId, ['id']);
    
        if (!$roleModel) {
            throw new ModelNotFoundException('无此角色');
        }
    
        return $roleModel->permissions;
    }
}
