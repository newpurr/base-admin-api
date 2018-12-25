<?php

namespace App\Models;

use App\Models\helper\StateQueryTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\Admin
 *
 * @property int                                      $id
 * @property string                                   $account    账号
 * @property string                                   $nickname   昵称
 * @property string                                   $mobile     手机号
 * @property string                                   $password   密码
 * @property int                                      $state      启用状态 1-启用 2-禁用
 * @property int                                      $is_deleted 是否删除:0-未删除 1-已删除
 * @property \Illuminate\Support\Carbon|null          $created_at
 * @property \Illuminate\Support\Carbon|null          $updated_at
 * @property \Illuminate\Database\Eloquent\Collection $roles
 * @method static \Illuminate\Database\Eloquent\Builder|$this newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|$this newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|$this query()
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereIsDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Admin extends Authenticatable implements JWTSubject
{
    use StateQueryTrait;
    
    protected $table   = 'admins';
    
    protected $guarded = [];
    
    protected $hidden  = ['password', 'pivot'];
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'nickname' => $this->nickname
        ];
    }
    
    /**
     * permissions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class, AssignedRoles::tableName(), 'assigned_id', 'role_id');
    }
}
