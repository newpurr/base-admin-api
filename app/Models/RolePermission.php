<?php

namespace App\Models;

use App\Models\helper\TableNameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\RolePermission
 *
 * @property int                    $role_id       角色ID
 * @property int                    $permission_id 权限ID
 * @property \App\Models\Permission $permission
 * @property \App\Models\Role       $role
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission query()
 * @mixin \Eloquent
 */
class RolePermission extends Model
{
    use TableNameTrait;
    
    /**
     * 禁止自动维护时间
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * table name
     *
     * @var string
     */
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
