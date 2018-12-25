<?php

namespace App\Services\Admin\User;

use App\Services\Contracts\BaseServiceInterface as BaseService;
use App\Services\Contracts\BatchChangeStateServiceInterface as BatchChangeState;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserService
 *
 * 后台用户Service
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Admin\User
 */
interface UserService extends BatchChangeState, BaseService
{
    /**
     * 分配角色
     *
     * @param int   $userId    用户ID
     * @param array $roleIdArr 角色id数组
     *
     * @return bool
     */
    public function allotRole(int $userId, array $roleIdArr) : bool;
    
    /**
     * 删除分配的角色
     *
     * @param int $userId 用户ID
     *
     * @return bool
     */
    public function deleteByUserId(int $userId) : bool;
    
    /**
     * 获取用户角色
     *
     * @param int $userId
     *
     * @return Collection
     */
    public function getRoleByUserId(int $userId) : Collection;
}
