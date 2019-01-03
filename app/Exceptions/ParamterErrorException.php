<?php

namespace App\Exceptions;

use App\Constant\JsonResponseCode;
use Throwable;

/**
 * Class ParamterErrorException
 *
 * 参数异常处理类
 *
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Exceptions
 */
class ParamterErrorException extends CustomException
{
    
    /**
     * ParamterErrorException constructor.
     *
     * @param string          $message
     * @param int             $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        $message = '参数错误',
        $code = JsonResponseCode::PARAMETER_ERROR,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
