<?php

namespace App\Repository\Repositories;

use App\Models\Admin;
use App\Repository\Contracts\AdminRepository;
use App\Repository\Helper\BatchOperation;
use App\Repository\Validators\AdminValidator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Repository\Repositories;
 */
class AdminRepositoryEloquent extends BaseRepository implements AdminRepository
{
    use BatchOperation;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() : string
    {
        return Admin::class;
    }
    
    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return AdminValidator::class;
    }
    
    /**
     * 分配角色
     *
     * @param int   $userId    user id
     * @param array $roleIdArr the role model  primaryKey array
     *
     * @return bool
     * @throws \Exception
     */
    public function allotRole(int $userId, array $roleIdArr) : bool
    {
        try {
            $this->sync($userId, 'roles', $roleIdArr);
        } catch (\Exception $e) {
            throw $e;
        }
        
        return true;
    }
    
    /**
     * 清空角色
     *
     * @param int $userId
     *
     * @return bool
     * @throws \Exception
     */
    public function clearRoleByUserId(int $userId) : bool
    {
        return $this->allotRole($userId, []);
    }
    
    /**
     * 根据用户ID获取用户拥有的角色
     *
     * @param int $userId
     *
     * @return Collection
     */
    public function getRoleCollectionByRoleId(int $userId) : Collection
    {
        /** @var \App\Models\Admin $userModel */
        $userModel = $this->with('roles')->find($userId, ['id']);
        
        if (!$userModel) {
            throw new ModelNotFoundException('无此用户');
        }
        
        return $userModel->roles;
    }
}
