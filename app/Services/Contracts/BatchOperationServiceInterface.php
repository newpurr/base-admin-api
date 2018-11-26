<?php

namespace App\Services\Contracts;

/**
 * Interface BatchOperationServiceInterface
 *
 * 批量操作接口
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\Role\Contracts
 */
interface BatchOperationServiceInterface
{
    /**
     * 批量更新
     *
     * @param array $attributes
     * @param array $where
     *
     * @return int
     */
    public function batchUpdate(array $attributes, array $where) : int;
}
