<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\RolePermission
 *
 * @property int                         $role_id       角色ID
 * @property int                         $permission_id 权限ID
 * @property \Carbon\Carbon|null         $created_at
 * @property-read \App\Models\Permission $permission
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission wherePermissionId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission whereRoleId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission query()
 * @mixin \Eloquent
 */
class RolePermission extends BaseModel
{
    //
    
    protected $table = 'role_permissions';
    
    /**
     * permission
     *
     * @return HasOne
     */
    public function permission() : HasOne
    {
        return $this->hasOne(Permission::class, 'id', 'permission_id');
    }
}
