<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use SuperHappysir\Support\Constant\Enum\DeletedStateEnum;
use SuperHappysir\Support\Constant\Enum\StateEnum;

/**
 * App\Models\RolePermission
 *
 * @property int                    $role_id       角色ID
 * @property int                    $permission_id 权限ID
 * @property \Carbon\Carbon|null    $created_at
 * @property \App\Models\Permission $permission
 * @property \App\Models\Role       $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission wherePermissionId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission whereRoleId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission query()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder$this awaiting()
 * @method static \Illuminate\Database\Eloquent\Builder$this deleted()
 * @method static \Illuminate\Database\Eloquent\Builder$this deletedState( $stateCode = 0 )
 * @method static \Illuminate\Database\Eloquent\Builder$this disabled()
 * @method static \Illuminate\Database\Eloquent\Builder$this enabled()
 * @method static \Illuminate\Database\Eloquent\Builder$this normality()
 * @method static \Illuminate\Database\Eloquent\Builder$this notDeleted()
 * @method static \Illuminate\Database\Eloquent\Builder$this state( $stateCode = 1 )
 */
class RolePermission extends BaseModel
{
    //
    
    protected $table = 'roles_permissions';
    
    /**
     * permission
     *
     * @return HasOne
     */
    public function permission() : HasOne
    {
        return $this->hasOne(Permission::class, 'id', 'permission_id');
    }
    
    /**
     * role
     *
     * @return HasOne
     */
    public function role() : HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
