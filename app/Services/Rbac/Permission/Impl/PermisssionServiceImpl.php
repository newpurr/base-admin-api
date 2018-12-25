<?php

namespace App\Services\Rbac\Permission\Impl;

use App\Models\Permission;
use App\Repository\Contracts\PermissionRepository;
use App\Repository\Criteria\Id;
use App\Repository\Criteria\IsDeletedCriteria;
use App\Repository\Criteria\StateCriteria;
use App\Repository\Criteria\Permission\Type;
use App\Services\Helper\BatchChangeState;
use App\Services\Rbac\Permission\PermissionService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PermisssionServiceImpl implements PermissionService
{
    use BatchChangeState;
    
    /**
     * PermisssionServiceImpl constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->repostitory = $permissionRepository;
    }
    
    /**
     * 获取分页列表
     * @param int   $pageSize
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $pageSize, $columns = ['*']) : LengthAwarePaginator
    {
        $this->repostitory->pushCriteria(app(IsDeletedCriteria::class));
        $this->repostitory->pushCriteria(app(StateCriteria::class));
        $this->repostitory->pushCriteria(app(Type::class));
        $this->repostitory->pushCriteria(app(Id::class));
        
        return $this->repostitory->paginate($pageSize, $columns);
    }
    
    /**
     * 获取单个角色信息
     *
     * @param int   $id
     *
     * @param array $columns
     *
     * @return \App\Models\Permission|null
     */
    public function find(int $id, $columns = ['*' ]) : ?Permission
    {
        return $this->repostitory->find($id, $columns);
    }
    
    /**
     * 创建一个角色
     *
     * @param array $permissionAttributes
     *
     * @return \App\Models\Permission
     */
    public function create(array $permissionAttributes) : Permission
    {
        return $this->repostitory->create($permissionAttributes);
    }
    
    /**
     * 更新一个角色
     *
     * @param array $permissionAttributes
     * @param int   $id
     *
     * @return Permission
     */
    public function update(array $permissionAttributes, int $id) : Permission
    {
        return $this->repostitory->update($permissionAttributes, $id);
    }
    
    /**
     * 获取所有前端路径path
     *
     * @return array
     */
    public function getTheFrontEndPath() : array
    {
        return $this->repostitory->getTheFrontEndPath();
    }
    
    /**
     * 通过权限ID获取权限信息
     *
     * @param array $idArr   权限ID数组
     * @param array $columns 获取的列
     *
     * @return Collection
     */
    public function getPermissionCollectionByIdArr(array $idArr, $columns = [ '*' ]) : Collection
    {
        return $this->repostitory->findWhereIn('id', $idArr, $columns);
    }
}
