<?php

namespace App\Exceptions;

use App\Constant\JsonResponseCode;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class ParamterErrorException
 *
 * 资源不存在exception
 *
 * @author  luotao
 * @version 1.0
 * @package App\Exceptions
 */
class NotFoundException extends \Exception implements NotFoundExceptionInterface
{
    
    /**
     * ParamterErrorException constructor.
     */
    public function __construct()
    {
        parent::__construct('资源不存在', JsonResponseCode::NOT_FOUND);
    }
}
