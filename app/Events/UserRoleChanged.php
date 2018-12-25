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
     * @var \App\Models\Admin
     */
    private $userModel;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Admin $userModel)
    {
        $this->userModel = $userModel;
    }
}
