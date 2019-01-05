<?php

namespace App\Exceptions;

use App\Constant\JsonResponseCode;

/**
 * Class ParamterErrorException
 *
 * 未授权exception
 *
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Exceptions
 */
class NotAllowedException extends CustomException
{
    
    /**
     * ParamterErrorException constructor.
     */
    public function __construct()
    {
        parent::__construct('您没有权限访问!', JsonResponseCode::NOT_ALLOWED);
    }
}
