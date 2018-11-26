<?php

namespace App\Repository\Helper;

use Closure;

/**
 * Trait BeatchUpdate
 *
 *
 *
 * @author  luotao
 * @version 1.0
 * @package App\Repository\Helper
 */
trait BatchOperation
{
    /**
     * Delete multiple entities by given criteria.
     *
     * @param array $attributes
     * @param Closure $where
     *
     * @return int
     */
    public function updateWhere(array $attributes, Closure $where) : int
    {
        return $this->model->where($where)->update($attributes);
    }
}