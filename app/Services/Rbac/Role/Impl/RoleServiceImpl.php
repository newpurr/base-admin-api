<?php

namespace App\Services\Rbac\Role\Impl;

use App\Models\Role;
use App\Repository\Contracts\RoleRepository;
use App\Repository\Criteria\IsDeletedCriteria;
use App\Repository\Criteria\StateCriteria;
use App\Services\Helper\BatchChangeState;
use App\Services\Rbac\Role\RoleService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class RoleServiceImpl
 *
 * Role角色实现类
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\Role\Impl
 */
class RoleServiceImpl implements RoleService
{
    use BatchChangeState;
    
    /**
     * role Repository
     *
     * @var RoleRepository
     */
    private $roleRepository;
    
    /**
     * RoleServiceImpl constructor.
     *
     * @param $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->repostitory = $roleRepository;
    }
    
    /**
     * 获取分页列表
     *
     * @param int   $pageSize
     * @param array $columns
     *
     * @return LengthAwarePaginator
     */
    public function paginate(int $pageSize, $columns = [ '*' ]) : LengthAwarePaginator
    {
        $this->repostitory->pushCriteria(app(IsDeletedCriteria::class));
        $this->repostitory->pushCriteria(app(StateCriteria::class));
        return $this->repostitory->paginate($pageSize, $columns);
    }
    
    /**
     * 获取单个角色信息
     *
     * @param int   $roleId
     *
     * @param array $columns
     *
     * @return \App\Models\Role|null
     */
    public function find(int $roleId, $columns = [ '*' ]) : ?Role
    {
        return $this->repostitory->find($roleId, $columns);
    }
    
    /**
     * 创建一个角色
     *
     * @param array $roleAttributes
     *
     * @return \App\Models\Role
     */
    public function create(array $roleAttributes) : Role
    {
        return $this->repostitory->create($roleAttributes);
    }
    
    /**
     * 更新一个角色
     *
     * @param array $roleAttributes
     * @param int   $id
     *
     * @return Role
     */
    public function update(array $roleAttributes, int $id) : Role
    {
        return $this->repostitory->update($roleAttributes, $id);
    }
}
