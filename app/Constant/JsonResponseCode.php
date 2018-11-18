<?php

namespace App\Constant;

use App\Constant\util\MappingHelper;

/**
 * Class JsonResponseCode Json响应状态码常量
 *
 * @package App\Constant
 */
class JsonResponseCode
{
    use MappingHelper;
    
    /**
     * 请求成功
     *
     * @var int
     */
    public const SUCCESS = 200;
    
    /**
     * 服务器内部错误
     *
     * @var int
     */
    public const SERVER_ERROR = 500;
    
    /**
     * 参数错误
     *
     * @var int
     */
    public const PARAMETER_ERROR = 100001;
    
    /**
     * 状态码及对应的信息映射
     *
     * @var array
     */
    protected const MAPPING = [
        self::SUCCESS         => '成功',
        self::SERVER_ERROR    => '服务器繁忙',
        self::PARAMETER_ERROR => '参数错误',
    ];
    
}
