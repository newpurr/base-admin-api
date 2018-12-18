<?php

namespace App\Services\Rbac\Permission\Impl;

use App\Models\Permission;
use App\Repository\Contracts\PermissionRepository;
use App\Repository\Criteria\IsDeletedCriteria;
use App\Repository\Criteria\Permission\Id;
use App\Repository\Criteria\StateCriteria;
use App\Repository\Criteria\Permission\Type;
use App\Services\Helper\BatchChangeState;
use App\Services\Rbac\Permission\PermissionService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use SuperHappysir\Constant\DeletedStateEnum;
use Illuminate\Database\Eloquent\Collection;

class PermisssionServiceImpl implements PermissionService
{
    use BatchChangeState;
    
    /**
     * 权限service
     * @var PermissionRepository
     */
    protected $permissionRepository;
    
    /**
     * PermisssionServiceImpl constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    
        $this->setRepostitory($permissionRepository);
    }
    
    /**
     * 获取分页列表
     * @param int   $pageSize
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $pageSize, $columns = ['*']) : LengthAwarePaginator
    {
        $this->permissionRepository->pushCriteria(app(IsDeletedCriteria::class));
        $this->permissionRepository->pushCriteria(app(StateCriteria::class));
        $this->permissionRepository->pushCriteria(app(Type::class));
        $this->permissionRepository->pushCriteria(app(Id::class));
        
        return $this->permissionRepository->paginate($pageSize, $columns);
    }
    
    /**
     * 获取单个角色信息
     *
     * @param int   $roleId
     *
     * @param array $columns
     *
     * @return \App\Models\Permission|null
     */
    public function find(int $roleId, $columns = [ '*' ]) : ?Permission
    {
        return $this->permissionRepository->find($roleId, $columns);
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
        return $this->permissionRepository->create($permissionAttributes);
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
        return $this->permissionRepository->update($permissionAttributes, $id);
    }
    
    /**
     * 删除一个模型
     *
     * @param int $id
     *
     * @return bool
     */
    public function softDelete(int $id) : bool
    {
        return (bool) $this->permissionRepository->update([ 'is_deleted' => DeletedStateEnum::IS_DELETED ], $id);
    }
    
    /**
     * 获取所有前端路径path
     *
     * @return array
     */
    public function getTheFrontEndPath() : array
    {
        return $this->permissionRepository->getTheFrontEndPath();
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
        return $this->permissionRepository->findWhereIn('id', $idArr, $columns);
    }
}
