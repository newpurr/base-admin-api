<?php

namespace App\Services\Admin\User\Impl;

use App\Exceptions\ParamterErrorException;
use App\Models\BaseModel;
use App\Repository\Contracts\AdminRepository;
use App\Repository\Criteria\IsDeletedCriteria;
use App\Repository\Criteria\StateCriteria;
use App\Repository\Validators\AdminValidator;
use App\Services\Admin\User\UserService;
use App\Services\Helper\BatchChangeState;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Validator;

/**
 * Class UserServiceImpl
 *
 * 用户服务实现
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Admin\User\Impl
 */
class UserServiceImpl implements UserService
{
    use BatchChangeState;
    
    /**
     * PermisssionServiceImpl constructor.
     *
     * @param \App\Repository\Contracts\AdminRepository $repository
     */
    public function __construct(AdminRepository $repository)
    {
        $this->repostitory = $repository;
    }
    
    /**
     * 获取单个角色信息
     *
     * @param int   $id
     * @param array $columns
     *
     * @return BaseModel|null
     */
    public function find(int $id, $columns = [ '*' ])
    {
        return $this->repostitory->find($id, $columns);
    }
    
    /**
     * 创建一个模型
     *
     * @param array $attributes
     *
     * @return BaseModel
     */
    public function create(array $attributes)
    {
        $attributes = $this->ensurePasswordIsValid($attributes);
        
        return $this->repostitory->create($attributes);
    }
    
    /**
     * 获取分页列表
     *
     * @param int   $pageSize
     * @param array $columns
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $pageSize, $columns = [ '*' ]) : LengthAwarePaginator
    {
        $this->repostitory->pushCriteria(app(IsDeletedCriteria::class));
        $this->repostitory->pushCriteria(app(StateCriteria::class));
        
        return $this->repostitory->paginate($pageSize, $columns);
    }
    
    /**
     * 更新一个模型
     *
     * @param array $attributes
     * @param int   $id
     *
     * @return BaseModel
     */
    public function update(array $attributes, int $id)
    {
        $attributes = $this->ensurePasswordIsValid($attributes);
    
        return $this->repostitory->update($attributes, $id);
    }
    
    /**
     * 保证password符合指定规则
     *
     * @param array $attributes
     *
     * @return array
     */
    private function ensurePasswordIsValid(array $attributes) : array
    {
        // 涉及密码的修改,因此将密码的Validator单独校验
        // I5-Repository对当前场景的支持有缺陷
        // 其校验实在fill model后,而我们将密码hash是在fill这一步做的操作
        // 存在修改器等操作会影响校验结果
        if (!empty($attributes['password'])) {
            $adminValidator = app(AdminValidator::class);
            $validator      = Validator::make(
                $attributes,
                $adminValidator->getRules(AdminValidator::RULE_PASSWORD),
                $adminValidator->getMessages()
            );
            if ($validator->fails()
                && $errorMsg = $validator->errors()->first('password')) {
                throw new ParamterErrorException($errorMsg);
            }
        }
        
        return $attributes;
}
}
