<?php

namespace App\Models\helper;

use SuperHappysir\Constant\Enum\DeletedStateEnum;
use SuperHappysir\Constant\Enum\StateEnum;

/**
 * Class ScopeHelper
 *
 * scope 辅助函数
 *
 * @author  luotao
 * @version 1.0
 * @package App\Models\helper
 * @method static \Illuminate\Database\Eloquent\Builder|$this deleted()
 * @method static \Illuminate\Database\Eloquent\Builder|$this notDeleted()
 * @method static \Illuminate\Database\Eloquent\Builder|$this disabled()
 * @method static \Illuminate\Database\Eloquent\Builder|$this enabled()
 * @method static \Illuminate\Database\Eloquent\Builder|$this awaiting()
 * @method static \Illuminate\Database\Eloquent\Builder|$this normality()
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
