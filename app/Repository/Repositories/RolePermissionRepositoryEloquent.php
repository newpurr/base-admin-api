<?php

namespace App\Repository\Repositories;

use App\Models\RolePermission;
use App\Repository\Contracts\RolePermissionRepository;
use App\Repository\Helper\BatchOperation;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class RolePermissionRepositoryEloquent.
 *
 * @package namespace App\Repository\Repositories;
 */
class RolePermissionRepositoryEloquent extends BaseRepository implements RolePermissionRepository
{
    use BatchOperation;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() : string
    {
        return RolePermission::class;
    }
}
