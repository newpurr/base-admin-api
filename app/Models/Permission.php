<?php

namespace App\Models;

use App\Models\helper\StateHelper;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Permission
 *
 * @property int                 $id          自增主键
 * @property string              $name        权限名称
 * @property string              $path        权限path
 * @property string              $method      请求方法
 * @property string              $description 描述
 * @property int                 $per_type    权限类型 1-API 2-菜单/页面 3-按钮
 * @property int                 $parent_id   父级ID
 * @property int                 $is_deleted  是否删除:0-未删除 1-已删除
 * @property \Carbon\Carbon      $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property Permission          $parentPermission
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission wherePerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereIsDeleted($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection $roles
 * @property int $state 启用状态 1-启用 2-禁用
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel awaiting()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel deleted()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel deletedState($stateCode = 0)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel disabled()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel enabled()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel normality()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel notDeleted()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel state($stateCode = 1)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereState($value)
 */
class Permission extends BaseModel
{
    use StateHelper;
    
    protected $table = 'permissions';
    
    /**
     * 父权限模型
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parentPermission() : HasOne
    {
        return $this->hasOne(__CLASS__, 'id', 'parent_id');
    }
    
    /**
     * roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permissions', 'role_id', 'permission_id');
    }
}
