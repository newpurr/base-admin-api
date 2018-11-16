<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RolePermission
 *
 * @property int $id
 * @property int $role_id 角色ID
 * @property int $permission_id 权限ID
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Permission $permission
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RolePermission query()
 */
class RolePermission extends Model
{
    //
    
    /**
     * permission
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function permission()
    {
        return $this->hasOne(Permission::class, 'id', 'permission_id');
    }
}
