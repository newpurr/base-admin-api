<?php

namespace App\Constant;

use App\Constant\util\MappingHelper;

/**
 * Class DeletedStateEnum
 *
 * 记录公用状态常量
 *
 * @author  luotao
 * @version 1.0
 * @package App\Constant
 */
class DeletedStateEnum
{
    use MappingHelper;
    
    /**
     * 正常状态
     *
     * @var int
     */
    public const NORMAL = 0;
    
    /**
     * 已删除状态
     *
     * @var int
     */
    public const IS_DELETED = 1;
    
    /**
     * 状态码及对应的信息映射
     *
     * @var array
     */
    protected const MAPPING = [
        self::NORMAL     => '正常',
        self::IS_DELETED => '删除'
    ];
}
