<?php

namespace App\Services\Contracts;

/**
 * Interface BatchChangeStateServiceInterface
 *
 * 批量操作接口
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\Role\Contracts
 */
interface BatchChangeStateServiceInterface
{
    /**
     * 批量启用
     *
     * @param array $idArr
     *
     * @return int
     */
    public function batchEnabled(array $idArr);
    
    /**
     * 批量禁用
     *
     * @param array $idArr
     *
     * @return int
     */
    public function batchDisabled(array $idArr);
}
