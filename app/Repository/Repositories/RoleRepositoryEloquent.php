<?php

namespace App\Repository\Repositories;

use App\Models\Role;
use App\Repository\Contracts\RoleRepository;
use App\Repository\Helper\BatchOperation;
use App\Repository\Validators\RoleValidator;
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
}
