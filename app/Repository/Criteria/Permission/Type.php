<?php

namespace App\Repository\Criteria\Permission;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class Type
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Repository\Criteria
 */
class Type implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     * @param \App\Models\Permission $model
     * @param RepositoryInterface    $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $type = request('permission_type', null);
    
        if (null === $type) {
            return $model;
        }
        
        return $model->whereIn('permission_type', explode(',', $type));
    }
}
