<?php

namespace App\Models\helper;

use SuperHappysir\Support\Constant\Enum\DeletedStateEnum;
use SuperHappysir\Support\Constant\Enum\StateEnum;

/**
 * Class StateQueryTrait
 *
 * state query trait
 *
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Models\helper
 * @method static \Illuminate\Database\Eloquent\Builder|$this deleted()
 * @method static \Illuminate\Database\Eloquent\Builder|$this notDeleted()
 * @method static \Illuminate\Database\Eloquent\Builder|$this disabled()
 * @method static \Illuminate\Database\Eloquent\Builder|$this enabled()
 * @method static \Illuminate\Database\Eloquent\Builder|$this awaiting()
 * @method static \Illuminate\Database\Eloquent\Builder|$this normality()
 */
trait StateQueryTrait
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
    
    /**
     * 删除条件scope
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int                                   $stateCode
     *
     * @return mixed
     */
    public function scopeDeletedState($query, $stateCode = DeletedStateEnum::NORMAL)
    {
        return $query->where('is_deleted', $stateCode);
    }
    
    /**
     * 状态条件scope
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|array                             $stateCode
     *
     * @return mixed
     */
    public function scopeState($query, $stateCode = StateEnum::ENABLED)
    {
        $stateCode = !\is_array($stateCode) ? [ $stateCode ] : $stateCode;
        
        return $query->whereIn('state', $stateCode);
    }
}
