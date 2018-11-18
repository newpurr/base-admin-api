<?php

namespace App\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereEnable( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereName( $value )
 * @mixin \Eloquent
 */
class Role extends BaseModel implements Transformable
{
    use TransformableTrait;
    
    public function scopeName($query, string $name)
    {
    
    }
}
