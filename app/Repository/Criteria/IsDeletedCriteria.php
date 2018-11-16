<?php

namespace App\Repository\Criteria;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class IdInCriteriaCriteria.
 *
 * @package namespace App\Repository\Criteria;
 */
class IsDeletedCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param RepositoryInterface                 $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('enable', request('enable', 1));
    }
}
