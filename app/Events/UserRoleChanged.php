<?php

namespace App\Events;

use App\Models\Admin;
use Illuminate\Queue\SerializesModels;

class UserRoleChanged
{
    use SerializesModels;
    
    /**
     * 管理员用户模型
     *
     * @var Admin
     */
    private $userModel;
    
    /**
     * Create a new event instance.
     *
     * @param Admin $userModel
     */
    public function __construct(Admin $userModel)
    {
        $this->userModel = $userModel;
    }
    
    /**
     * getUserModel
     *
     * @return Admin
     */
    public function getUserModel() : Admin
    {
        return $this->userModel;
    }
}
