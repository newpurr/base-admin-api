<?php

namespace App\Models;

use App\Models\helper\StateJudgeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Permission
 *
 * @property int                                           $id          自增主键
 * @property string                                        $name        权限名称
 * @property string                                        $path        权限path
 * @property string                                        $method      请求方法
 * @property string                                        $description 描述
 * @property int                                           $per_type    权限类型 1-API 2-菜单/页面 3-按钮
 * @property int                                           $parent_id   父级ID
 * @property int                                           $is_deleted  是否删除:0-未删除 1-已删除
 * @property int                                           $state       启用状态 1-启用 2-禁用
 * @property \Carbon\Carbon                                $created_at
 * @property \Carbon\Carbon|null                           $updated_at
 * @property Permission                                    $parentPermission
 * @property-read \Illuminate\Database\Eloquent\Collection $roles
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this wherePerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|$this newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|$this query()
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereIsDeleted($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|$this awaiting()
 * @method static \Illuminate\Database\Eloquent\Builder|$this deleted()
 * @method static \Illuminate\Database\Eloquent\Builder|$this deletedState($stateCode = 0)
 * @method static \Illuminate\Database\Eloquent\Builder|$this disabled()
 * @method static \Illuminate\Database\Eloquent\Builder|$this enabled()
 * @method static \Illuminate\Database\Eloquent\Builder|$this normality()
 * @method static \Illuminate\Database\Eloquent\Builder|$this notDeleted()
 * @method static \Illuminate\Database\Eloquent\Builder|$this state($stateCode = 1)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereState($value)
 */
class Permission extends BaseModel
{
    use StateJudgeTrait;
    
    protected $table = 'permissions';
    
    /**
     * 父权限模型
     *
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
        return $this->belongsToMany(Role::class, RolePermission::tableName(), 'permission_id', 'role_id');
    }
}
