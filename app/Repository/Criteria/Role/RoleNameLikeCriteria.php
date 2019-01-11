<?php

namespace App\Repository\Criteria\Role;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class StateCriteria.
 *
 * @package namespace App\Repository\Criteria;
 */
class RoleNameLikeCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param \App\Models\Role    $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $name = request('name', null);
        
        if (null === $name) {
            return $model;
        }
        
        return $model->nameLike($name);
    }
}
