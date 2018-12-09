<?php

namespace App\Repository\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PermissionValidator.
 * @package namespace App\Repository\Validators;
 */
class PermissionValidator extends LaravelValidator
{
    /**
     * Validation Rules
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            // bail在某个属性第一次验证失败后停止运行验证规则
            'name' => 'bail|required|unique:promissess|between:2,10',
            'path' => 'bail|required|unique:promissess',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'unique:roles|between:2,10'
        ],
    ];
    
    protected $messages = [
        'name.unique' => '权限名已经存在',
        'path.unique' => '权限名已经存在',
    ];
}
