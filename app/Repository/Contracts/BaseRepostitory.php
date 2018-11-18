<?php

namespace App\Repository\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BaseRepostitory
 *
 * @author  luotao
 * @version 1.0
 * @package App\Repository\Contracts
 */
interface BaseRepostitory extends RepositoryInterface
{
    public function pushCriteria($criteria);
    
    public function updateWhere(array $attributes, \Closure $where) : int;
}
