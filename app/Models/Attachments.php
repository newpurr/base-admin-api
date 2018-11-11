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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attachments whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attachments whereDescription( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attachments whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attachments whereMethod( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attachments whereName( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attachments wherePath( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attachments wherePerType( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attachments whereUpdatedAt( $value )
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attachments whereParentId( $value )
 */
class Attachments extends Model
{
    protected $table = 'attachments';
    
    protected $guarded = [];
}
