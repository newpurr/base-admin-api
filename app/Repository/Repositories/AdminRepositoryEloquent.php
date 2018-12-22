<?php

namespace App\Repository\Repositories;

use App\Models\Admin;
use App\Repository\Contracts\AdminRepository;
use App\Repository\Helper\BatchOperation;
use App\Repository\Validators\AdminValidator;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Repository\Repositories;
 */
class AdminRepositoryEloquent extends BaseRepository implements AdminRepository
{
    use BatchOperation;
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() : string
    {
        return Admin::class;
    }
    
    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return AdminValidator::class;
    }
}
