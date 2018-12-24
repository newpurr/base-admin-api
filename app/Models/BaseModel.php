<?php

namespace App\Models;

use App\Models\helper\StateQueryTrait;
use App\Models\helper\TableNameTrait;
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
 * @method static \Illuminate\Database\Eloquent\Builder$this awaiting()
 * @method static \Illuminate\Database\Eloquent\Builder$this deleted()
 * @method static \Illuminate\Database\Eloquent\Builder$this disabled()
 * @method static \Illuminate\Database\Eloquent\Builder$this enabled()
 * @method static \Illuminate\Database\Eloquent\Builder$this normality()
 * @method static \Illuminate\Database\Eloquent\Builder$this notDeleted()
 */
abstract class BaseModel extends Model
{
    use StateQueryTrait,TableNameTrait;
    
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
}
