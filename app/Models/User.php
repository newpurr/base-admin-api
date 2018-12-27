<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\User
 *
 * @property int                 $id
 * @property string              $name
 * @property string              $email
 * @property string              $password
 * @property string|null         $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|$this newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|$this newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|$this query()
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    // Rest omitted for brevity
    
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
        return [];
    }
}
