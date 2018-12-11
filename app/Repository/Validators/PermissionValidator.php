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
            'name' => 'bail|required|unique:permissions|between:2,10',
            'path' => 'bail|required|unique:permissions',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'unique:permissions|between:2,10',
            'path' => 'bail|required|unique:permissions',
        ],
    ];
    
    protected $messages = [
        'name.unique' => '权限名已经存在',
        'path.unique' => '权限路径已经存在',
    ];
}
