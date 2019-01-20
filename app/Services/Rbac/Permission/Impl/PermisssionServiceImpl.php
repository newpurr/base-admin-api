<?php

namespace App\Services\Rbac\Permission\Impl;

use App\Exceptions\ParamterErrorException;
use App\Models\Permission;
use App\Repository\Contracts\PermissionRepository;
use App\Repository\Criteria\Id;
use App\Repository\Criteria\IsDeletedCriteria;
use App\Repository\Criteria\Permission\Type;
use App\Repository\Criteria\StateCriteria;
use App\Services\Helper\BatchChangeState;
use App\Services\Rbac\Permission\PermissionService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Artisan;

class PermisssionServiceImpl implements PermissionService
{
    use BatchChangeState;
    
    /**
     * PermisssionServiceImpl constructor.
     *
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->repostitory = $permissionRepository;
    }
    
    /**
     * 获取分页列表
     *
     * @param int   $pageSize
     * @param array $columns
     *
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
    public function find(int $id, $columns = ['*']) : ?Permission
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
     * 通过权限ID获取权限信息
     *
     * @param array $idArr   权限ID数组
     * @param array $columns 获取的列
     *
     * @return Collection
     */
    public function getPermissionCollectionByIdArr(array $idArr, $columns = ['*']) : Collection
    {
        return $this->repostitory->findWhereIn('id', $idArr, $columns);
    }
    
    /**
     * 批量创建前端路由权限
     *
     * @param array $inputPermissionArr
     *
     * @return bool
     */
    public function createTheFrontEndPathPermission(array $inputPermissionArr) : bool
    {
        if (!$inputPermissionArr) {
            return true;
        }
        
        // 检测数据是否符合要求
        $inputPathCollection = collect($inputPermissionArr);
        $inputPathCollection->each(function ($permissionMap) {
            if (!$permissionMap['name']) {
                throw new ParamterErrorException('数据格式错误,部分数据缺失 name 属性');
            }
            if (!$permissionMap['path']) {
                throw new ParamterErrorException('数据格式错误,部分数据缺失 path 属性');
            }
        });
        
        // 过滤已存在的权限数据,生成待插入的数据数组
        $pathArr = $inputPathCollection->pluck('path')->toArray();
        if (!$pathArr) {
            throw new ParamterErrorException('数据格式错误');
        }
        /** @var Collection $existPermissionCollection */
        $existPermissionCollection = $this->repostitory->findWhereIn('path', $pathArr, ['path', 'permission_type']);
        $existPermissionCollection = $existPermissionCollection->filter(function (Permission $permission) {
            return !$permission->isApi();
        });
        $existPermissionPath       = $existPermissionCollection->pluck('path')->toArray();
        $insertPermissionArr       = $inputPathCollection->filter(function ($permissionMap) use ($existPermissionPath) {
            return !in_array($permissionMap['path'], $existPermissionPath, true);
        })->toArray();
        
        if (!$insertPermissionArr) {
            return true;
        }
        
        // 批量插入
        $status = $this->repostitory->insert($insertPermissionArr);
        
        if ($status) {
            // 给超级管理员分配所有权限
            Artisan::call('base-admin:ass-all-per');
        }
        
        return $status;
    }
}
