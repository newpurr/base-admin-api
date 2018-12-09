<?php

namespace App\Repository\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use SupperHappysir\Constant\DeletedStateEnum;

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
     * @param \App\Models\BaseModel $model
     * @param RepositoryInterface   $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->deletedState(request('is_deleted', DeletedStateEnum::NORMAL));
    }
}
