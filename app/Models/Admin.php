<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\Admin
 *
 * @property int                             $id
 * @property string                          $account    账号
 * @property string                          $nickname   昵称
 * @property string                          $mobile     手机号
 * @property string                          $password
 * @property int                             $state      启用状态 1-启用 2-禁用
 * @property int                             $is_deleted 是否删除:0-未删除 1-已删除
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereAccount( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereIsDeleted( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereMobile( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereNickname( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin wherePassword( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereState( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin whereUpdatedAt( $value )
 * @mixin \Eloquent
 */
class Admin extends Authenticatable implements JWTSubject
{
    protected $guarded = [];
    
    //
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
}
