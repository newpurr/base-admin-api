<?php

namespace App\Constant\Permission;

use SuperHappysir\Support\Constant\Enum\Lib\BaseEnum;

class Type extends BaseEnum
{
    
    /**
     * 接口
     *
     * @var int
     */
    public const API = 1;
    
    /**
     * 菜单
     *
     * @var int
     */
    public const MENU = 2;
    
    /**
     * 按钮
     *
     * @var int
     */
    public const BUTTON = 3;
    
    /**
     * 状态码及对应的信息映射
     *
     * @var array
     */
    protected static $translations = [
        self::API    => '接口',
        self::MENU   => '菜单',
        self::BUTTON => '按钮'
    ];
}
