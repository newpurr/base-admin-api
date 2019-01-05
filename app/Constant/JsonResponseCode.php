<?php

namespace App\Constant;

use SuperHappysir\Support\Constant\Enum\Util\MappingHelper;

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
     * 未授权
     *
     * @var int
     */
    public const UNAUTHORIZED = 401;
    
    /**
     * 未授权
     *
     * @var int
     */
    public const NOT_ALLOWED = 403;
    
    /**
     * 资源不存在
     *
     * @var int
     */
    public const NOT_FOUND = 404;
    
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
        self::SUCCESS         => '请求成功',
        self::UNAUTHORIZED    => '请先登录',
        self::NOT_ALLOWED     => '未授权',
        self::NOT_FOUND       => '资源不存在',
        self::SERVER_ERROR    => '服务器繁忙',
        self::PARAMETER_ERROR => '参数错误',
    ];
}
