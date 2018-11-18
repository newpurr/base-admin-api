<?php

namespace App\Repository\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class RoleValidator.
 *
 * @package namespace App\Repository\Validators;
 */
class RoleValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules    = [
        ValidatorInterface::RULE_CREATE => [
            // bail在某个属性第一次验证失败后停止运行验证规则
            'name' => 'bail|required|between:2,10'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
