<?php

namespace App\Services\Admin\User;

use App\Services\Contracts\BaseServiceInterface as BaseService;
use App\Services\Contracts\BatchChangeStateServiceInterface as BatchChangeState;

/**
 * Class UserService
 *
 * 后台用户Service
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Admin\User
 */
interface UserService extends BatchChangeState, BaseService
{
}
