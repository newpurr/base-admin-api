<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Permission
 *
 * @property int $id 自增主键
 * @property string $name 权限名称
 * @property string $path 权限path
 * @property string $method 请求方法
 * @property string $description 描述
 * @property int $per_type 权限类型 1-API 2-菜单/页面 3-按钮
 * @property int $parent_id 父级ID
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property Permission $parentPermission
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission wherePerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereParentId($value)
 */
class Permission extends Model
{
    protected $guarded = [];
    
    
    public function parentPermission()
    {
        return $this->hasOne(__CLASS__,'id','parent_id');
    }
}
