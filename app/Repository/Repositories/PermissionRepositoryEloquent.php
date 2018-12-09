<?php

namespace App\Repository\Repositories;

use App\Models\Permission;
use App\Repository\Contracts\PermissionRepository;
use App\Repository\Helper\BatchOperation;
use App\Repository\Validators\PermissionValidator;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PermissionRepositoryEloquent.
 * @package namespace App\Repository\Repositories;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    use BatchOperation;
    
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
}
