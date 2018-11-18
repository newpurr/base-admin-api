<?php

namespace App\Models;

use App\Constant\DeletedStateEnum;
use App\Constant\StateEnum;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role.
 *
 * @package namespace App\Models;
 * @property int                 $id
 * @property string              $name       角色名称
 * @property int                 $state      启用状态 1-启用 2-禁用
 * @property int                 $is_deleted 是否删除: 0-未删除 1-已删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method $this whereId( $value )
 * @method $this whereCreatedAt( $value )
 * @method $this whereUpdatedAt( $value )
 * @method $this newModelQuery()
 * @method $this newQuery()
 * @method $this query()
 * @method $this whereIsDeleted( $value )
 * @method $this whereState( $value )
 * @method $this deletedState( $stateCode )
 * @method $this state( $stateCode )
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * 禁止自动维护时间
     *
     * @var bool
     */
    public $timestamps = false;
    
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
