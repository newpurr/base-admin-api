<?php

namespace App\Services\Contracts;

use App\Models\BaseModel;

/**
 * interface BaseServiceInterface
 *
 * 服务类基础接口
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\Role\Contracts
 */
interface BaseServiceInterface
{
    /**
     * 获取单个角色信息
     *
     * @param int   $roleId
     * @param array $columns
     *
     * @return BaseModel|null
     */
    public function find(int $roleId, $columns = [ '*' ]);
    
    /**
     * 创建一个模型
     *
     * @param array $attributes
     *
     * @return BaseModel
     */
    public function create(array $attributes);
    
    /**
     * 获取分页列表
     *
     * @param int $pageSize
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $pageSize) : \Illuminate\Contracts\Pagination\LengthAwarePaginator;
    
    /**
     * 更新一个模型
     *
     * @param array $attributes
     * @param int   $id
     *
     * @return BaseModel
     */
    public function update(array $attributes, int $id);
    
    /**
     * 删除一个模型
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id);
}
