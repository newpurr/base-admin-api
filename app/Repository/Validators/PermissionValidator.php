<?php

namespace App\Repository\Validators;

use App\Repository\Validators\helper\CustomParserValidationRules;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

/**
 * Class PermissionValidator.
 *
 * @package namespace App\Repository\Validators;
 */
class PermissionValidator extends LaravelValidator
{
    use CustomParserValidationRules;
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules    = [
        ValidatorInterface::RULE_CREATE => [
            // bail在某个属性第一次验证失败后停止运行验证规则
            'name' => 'bail|required|between:2,10',
            'method'          => 'bail|required',
            'permission_type' => 'bail|required',
            'path' => 'bail|required|unique_with:permissions,permission_type,method',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'            => 'between:2,10',
            'method'          => 'bail|required',
            'permission_type' => 'bail|required',
            'path'            => 'bail|required|unique_with:permissions,permission_type,method,%d',
        ],
    ];
    
    protected $messages = [
        'name.unique' => '权限名已经存在',
        'path.unique' => '权限路径已经存在',
    ];
    

}
