<?php

namespace App\Repository\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class AdminValidator.
 *
 * @package namespace App\Repository\Validators;
 */
class AdminValidator extends LaravelValidator
{
    public const RULE_PASSWORD = 'password';
    
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules    = [
        ValidatorInterface::RULE_CREATE => [
            // bail在某个属性第一次验证失败后停止运行验证规则
            'account'  => 'bail|required|unique:admins|between:2,20|regex:/^[a-zA-Z0-9_-]{4,16}$/',
            'nickname' => 'bail|required|unique:admins|between:2,12',
            'mobile'   => 'bail|required|unique:admins|between:11,11',
            'password' => 'bail|required|dumbpwd',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nickname' => 'bail|required|unique:admins|between:2,12',
            'mobile'   => 'bail|required|unique:admins|between:11,11',
        ],
        self::RULE_PASSWORD => [
            'password' => 'between:8,18|dumbpwd|regex:/^[a-zA-z]+\w*$/',
        ]
    ];
    
    protected $messages = [
        'account.unique'   => '用户名已经存在',
        'account.regex'    => '用户名由数字字母下划线组成，长度为4-16位',
        'password.dumbpwd' => '请不要使用弱口令密码',
        'password.regex'   => '密码格式为字母开头,长度为9-17位',
    ];
}
