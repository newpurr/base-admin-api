<?php

namespace App\Models\helper;

use SupperHappysir\Constant\DeletedStateEnum;
use SupperHappysir\Constant\StateEnum;

/**
 * Class ScopeHelper
 *
 * scope 辅助函数
 *
 * @author  luotao
 * @version 1.0
 * @package App\Models\helper
 */
trait BaseScopeHelper
{
    /**
     * 已删除状态查询作用域
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDeleted($query)
    {
        return $query->where('is_deleted', DeletedStateEnum::IS_DELETED);
    }
    
    /**
     * 未删除状态查询作用域
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotDeleted($query)
    {
        return $query->where('is_deleted', DeletedStateEnum::NORMAL);
    }
    
    /**
     * 已禁用状态查询作用域
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDisabled($query)
    {
        return $query->where('state', StateEnum::DISABLED);
    }
    
    /**
     * 启用状态查询作用域
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnabled($query)
    {
        return $query->where('state', StateEnum::ENABLED);
    }
    
    /**
     * 待处理状态查询作用域
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAwaiting($query)
    {
        return $query->where('state', StateEnum::AWAITING);
    }
    
    /**
     * 正常状态(已启用未删除)查询作用域
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNormality($query)
    {
        return $query->where('is_deleted', DeletedStateEnum::NORMAL)
                     ->where('state', StateEnum::ENABLED);
    }
}
