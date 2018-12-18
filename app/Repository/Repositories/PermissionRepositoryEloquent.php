<?php

namespace App\Repository\Repositories;

use App\Constant\Permission\Type;
use App\Models\Permission;
use App\Repository\Contracts\PermissionRepository;
use App\Repository\Helper\BatchOperation;
use App\Repository\Validators\PermissionValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use SuperHappysir\Constant\DeletedStateEnum;
use SuperHappysir\Constant\StateEnum;

/**
 * Class PermissionRepositoryEloquent.
 * @package namespace App\Repository\Repositories;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    use BatchOperation;
    
    /**
     * @var Permission
     */
    protected $model;
    
    /**
     * Specify Model class name
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }
    
    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return PermissionValidator::class;
    }
    
    /**
     * 获取所有前端path
     *
     * @return array
     */
    public function getTheFrontEndPath() : array
    {
        return $this->model->whereState(StateEnum::ENABLED)
                           ->whereIsDeleted(DeletedStateEnum::NORMAL)
                           ->wherePerType(Type::MENU)
                           ->pluck('path')
                           ->toArray();
    }
}
