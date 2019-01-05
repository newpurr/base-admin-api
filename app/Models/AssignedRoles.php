<?php

namespace App\Models;

use App\Models\helper\TableNameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\RolePermission
 *
 * @property int               $role_id       角色ID
 * @property int               $assigned_id   分配用户ID
 * @property \App\Models\Admin $user
 * @property \App\Models\Role  $role
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission whereAssignedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RolePermission query()
 * @mixin \Eloquent
 */
class AssignedRoles extends Model
{
    use TableNameTrait;
    
    protected $table = 'assigned_roles';
    
    /**
     * 禁止自动维护时间
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * role
     *
     * @return HasOne
     */
    public function role() : HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
    
    /**
     * user
     *
     * @return HasOne
     */
    public function user() : HasOne
    {
        return $this->hasOne(Admin::class, 'id', 'assigned_id');
    }
}
