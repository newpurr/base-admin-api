<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Attachments
 *
 * @property int                 $id                     自增主键
 * @property string              $filename               文件名称
 * @property string              $src                    文件路径
 * @property string              $mime_type              文件类型
 * @property string              $owner_uid              文件拥有者
 * @property \Carbon\Carbon      $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereDescription( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereMethod( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereName( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|$this wherePath( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|$this wherePerType( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereParentId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|$this newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|$this newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|$this query()
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereOwnerUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|$this whereSrc($value)
 * @mixin \Eloquent
 */
class Attachments extends Model
{
    protected $table = 'attachments';
    
    protected $guarded = [];
}
