<?php

namespace App\Repository\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class Id
 * @author  luotao
 * @version 1.0
 * @package App\Repository\Criteria
 */
class Id implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     * @param \App\Models\BaseModel $model
     * @param RepositoryInterface    $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $type = request('ids', null);
    
        if (null === $type) {
            return $model;
        }
        
        return $model->whereIn('id', explode(',', $type));
    }
}
